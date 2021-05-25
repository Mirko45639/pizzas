<?php

namespace App\Http\Controllers;

use App\Mail\SmsPedido;
use App\Models\Cliente;
use App\Models\DetallePedido;
use App\Models\Pedidos;
use App\Models\Producto;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Instasent\SmsClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedidos::all();
        return view("pedidos.index", compact("pedidos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pedidos.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $clienteexiste = Cliente::where("dni", $request->cliente["dni"])->get();
                $cliente_id = 1;
                if (!count($clienteexiste)) {
                    $ultimoid = DB::table("cliente")->max("id");
                    if (!$ultimoid) {
                        $ultimoid = 0;
                    }
                    $cliente_id = $ultimoid + 1;
                    $cliente = new Cliente();
                    $cliente->id = $cliente_id;
                    $cliente->nombres = $request->cliente["nombres"];
                    $cliente->apellidos = $request->cliente["apellidos"];
                    $cliente->direccion = $request->cliente["direccion"];
                    $cliente->correo = $request->cliente["correo"];
                    $cliente->dni = $request->cliente["dni"];
                    $cliente->telefono = $request->cliente["telefono"];
                    $cliente->estado = "activo";
                    $cliente->save();
                } else {

                    $cliente_id = $clienteexiste[0]["id"];
                }
                $idpedido = DB::table("pedido")->max("id");
                if (!$idpedido) {
                    $idpedido = 0;
                }
                $idpedidoactual = $idpedido + 1;
                $pedido = new Pedidos();
                $pedido->id = $idpedidoactual;
                $pedido->fecha = new DateTime("UTC");
                $pedido->cliente_id = $cliente_id;
                $pedido->hora = $request->cliente["hora"];
                $pedido->estado = "pendiente";
                $pedido->save();
                $detalles = $request->detalles;
                foreach ($detalles as $detalle) {
                    $detallepedido = new DetallePedido();
                    $detallepedido->cantidad = $detalle["unidades"];
                    $detallepedido->precio = $detalle["precio"];
                    $detallepedido->producto_id = $detalle["id"];
                    $detallepedido->pedido_id = $idpedidoactual;
                    $detallepedido->save();
                }
            });
            //codigo para enviar sms
            $auth_basic = base64_encode("mirko.capurro@sider.com.pe:KDchnXbCFCDB");

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.labsmobile.com/json/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => '{"message":"Text of the SMS message", "tpoa":"Sender","recipient":[{"msisdn":' . $request->cliente["telefono"] . '}]}',
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic " . $auth_basic,
                    "Cache-Control: no-cache",
                    "Content-Type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $excepcion=array();
            try{
            $sms=new SmsPedido();
            Mail::to($request->cliente["correo"])->send($sms);
            }catch(Exception $e){
                $excepcion=["sms"=>$e->getMessage(),"line"=>$e->getLine()];
            }
             return response()->json(["save" => true,"excepcion"=>$excepcion , "sms" => $response,"error"=>$err]);
        } catch (Exception $e) {
            $clienteexiste = Cliente::where("dni", $request->cliente["dni"])->get();
            return response()->json(["save" => false, "mensaje" => $e->getMessage() . $e->getLine(), "cliente" => $clienteexiste[0]["id"]]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedidos::find($id);
        $detalles = DetallePedido::where("pedido_id", $id)->get();
        $total=0;

        foreach ($detalles as $detalle) {
            $producto = Producto::find($detalle["producto_id"]);
            $detalle["producto"] = $producto;
            $total+=$detalle["cantidad"]*$producto["precio"];
        }
        return view("pedidos.ver", compact("pedido", "detalles","total"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedidos)
    {
        return view("pedidos.editar");
    }
    public function pedido_editar($id)
    {
        $pedido = Pedidos::find($id);
        if (!isset($pedido)) {
            return response()->json(["error" => true]);
        }
        $productos = Producto::where("estado", "activo")->get();
        $cliente = Cliente::find($pedido->cliente_id);
        $detalles = DetallePedido::where("pedido_id", $pedido->id)->get();
        $pedido["cliente"] = $cliente;
        $pedido["detalles"] = $detalles;
        $pedido["productos"] = $productos;
        return response()->json($pedido);
    }
    public function pedidos_pendiente()
    {
        $pedidos = Pedidos::where("estado", "pendiente")->get();
        return view("pedidos.pendientes", compact("pedidos"));
    }
    public function pedidos_preparado()
    {
        $pedidos = Pedidos::where("estado", "preparado")->get();
        return view("pedidos.preparados", compact("pedidos"));
    }
    public function preparar_pedido($id)
    {
        $pedido = Pedidos::find($id);
        $pedido->estado = "preparado";
        $pedido->save();
        return redirect("/admin/pedido/preparado");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        try {
            DB::transaction(function () use ($request) {

                $cliente = Cliente::find($request->cliente["id"]);
                $cliente->nombres = $request->cliente["nombres"];
                $cliente->apellidos = $request->cliente["apellidos"];
                $cliente->direccion = $request->cliente["direccion"];
                $cliente->correo = $request->cliente["correo"];

                $cliente->telefono = $request->cliente["telefono"];
                $cliente->dni = $request->cliente["dni"];
                $cliente->estado = "activo";
                $cliente->save();

                $pedido = Pedidos::find($request->id);
                $pedido->cliente_id =  $request->cliente["id"];
                $pedido->hora = $request->cliente["hora"];
                $pedido->estado = "pendiente";
                $pedido->save();
                $detalles = $request->detalles;
                foreach ($detalles as $detalle) {
                    $detalleexite = DetallePedido::find($detalle["id"]);
                    if ($detalleexite) {
                        $detallepedido = DetallePedido::find($detalle["id"]);
                        $detallepedido->cantidad = $detalle["unidades"];
                        $detallepedido->precio = $detalle["precio"];
                        $detallepedido->producto_id = $detalle["id"];
                        $detallepedido->pedido_id = $request->id;
                        $detallepedido->save();
                    } else {
                        $detallepedido = new DetallePedido();
                        $detallepedido->cantidad = $detalle["unidades"];
                        $detallepedido->precio = $detalle["precio"];
                        $detallepedido->producto_id = $detalle["id"];
                        $detallepedido->pedido_id = $request->id;
                        $detallepedido->save();
                    }
                }
            });
            return response()->json(["save" => true]);
        } catch (Exception $e) {
            return response()->json(["save" => false, "mensaje" => $e->getMessage() . $e->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedidos::find($id);
        $pedido->estado = "cancelado";
        $pedido->save();
        return redirect("/admin/pedido");
    }
}
