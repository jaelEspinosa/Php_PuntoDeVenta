<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\ConfiguracionModel;

 class Configuracion extends BaseController 
 
 {
    protected $configuracion;
    protected $reglas;

    public function __construct()

    {        
       $this->configuracion = new ConfiguracionModel();

       helper(['form']);

       $this -> reglas = [
        'tienda_nombre' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El nombre de la tienda, es obligatorio'
        ]
        ],
        'tienda_rfc' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El RFC, es obligatorio'
          ]
          ],
          'tienda_telefono' => [
            'rules' => 'required',
            'errors' => [
              'required' => 'El Teléfono, es obligatorio'
            ]
          ],
          'tienda_email' => [
            'rules' => 'required|valid_email[valor]',
            'errors' => [
              'required' => 'El correo, es obligatorio',
              'valid_email' => 'El correo, no tiene un formato válido.'
            ]
            ],
            'tienda_direccion' => [
              'rules' => 'required',
              'errors' => [
                'required' => 'El campo dirección, es obligatorio'
              ]
              ],
              'ticket_leyenda' => [
                'rules' => 'required',
                'errors' => [
                  'required' => 'El campo leyenda del ticket, es obligatorio'
                ]
                ],
      
      ];

    }

    public function getIndex($activo = 1, $valid = null )
    {
     $nombre = $this->configuracion->where('nombre', 'tienda_nombre')->first();
     $rfc = $this->configuracion->where('nombre', 'tienda_rfc')->first();
     $telefono = $this->configuracion->where('nombre', 'tienda_telefono')->first();
     $email = $this->configuracion->where('nombre', 'tienda_email')->first();
     $direccion = $this->configuracion->where('nombre', 'tienda_direccion')->first();
     $leyenda = $this->configuracion->where('nombre', 'ticket_leyenda')->first();

     if( $valid != null ){
      $data = [ 'titulo' => 'Configuración' , 
                'nombre' => $nombre, 
                'rfc' => $rfc, 
                'telefono'=>$telefono, 
                'email' => $email, 
                'direccion'=>$direccion, 
                'leyenda' => $leyenda,
                'validation'=> $valid
              ];

     }else{
       $data = [ 'titulo' => 'Configuración' , 
                 'nombre' => $nombre, 
                 'rfc' => $rfc, 
                 'telefono'=>$telefono, 
                 'email' => $email, 
                 'direccion'=>$direccion, 
                 'leyenda' => $leyenda
                ];

     }

        echo view('header');
        echo view('configuracion/configuracion', $data);
        echo view('footer');
    }
    
   


   

    public function postActualizar(){

      if($this->request->is('post')  && $this->validate($this->reglas)){
      $this->configuracion->whereIn('nombre', ['tienda_nombre'])->set(['valor' => $this->request->getpost('tienda_nombre')])->update();
      $this->configuracion->whereIn('nombre', ['tienda_rfc'])->set(['valor' => $this->request->getpost('tienda_rfc')])->update();
      $this->configuracion->whereIn('nombre', ['tienda_telefono'])->set(['valor' => $this->request->getpost('tienda_telefono')])->update();
      $this->configuracion->whereIn('nombre', ['tienda_email'])->set(['valor' => $this->request->getpost('tienda_email')])->update();
      $this->configuracion->whereIn('nombre', ['tienda_direccion'])->set(['valor' => $this->request->getpost('tienda_direccion')])->update();
      $this->configuracion->whereIn('nombre', ['ticket_leyenda'])->set(['valor' => $this->request->getpost('ticket_leyenda')])->update();
      return redirect()->to(base_url().'configuracion');
      }else{
        return $this -> getIndex($this->request->getPost('id'), $this->validator);
      }
    }

   


   
 
}
