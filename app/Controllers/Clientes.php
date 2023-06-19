<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
use App\Models\ClientesModel;

 class Clientes extends BaseController 
 
 {
    protected $clientes;
    protected $reglas;
 



    public function __construct()

    {        
       
       $this->clientes = new ClientesModel();

        helper(['form']);
        
        $this -> reglas = [
        
        'nombre' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El nombre, es obligatorio'
          ]
        ],
        'email' => [
          'rules' => 'required|valid_email[clientes.email]',
          'errors' => [
            'required' => 'El Email, es obligatorio',
            'valid_email' => 'El Email no tiene formato válido'
          ]
        ],
        'direccion' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'La dirección, es obligatorio'
          ]
        ],
        'telefono' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El teléfono, es obligatorio'
          ]
        ]  
      ]; 

    }

    public function getIndex($activo = 1 )
    {
        $clientes = $this->clientes->where('activo',$activo)->findAll();        
        $data = ['titulo' => 'Clientes', 'datos'=>$clientes];

        echo view('header');
        echo view('clientes/clientes', $data);
        echo view('footer');
    }
    
    public function getNuevo(){
       
        $data = ['titulo' => 'Agregar Cliente'];

        echo view('header');
        echo view('Clientes/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      if($this->request->is('post')  && $this->validate($this->reglas)){
        
        $this->clientes->save([
                                'nombre' => $this->request->getpost('nombre'),
                                'direccion' => $this->request->getpost('direccion'),
                                'telefono' => $this->request->getpost('telefono'),
                                'email' => $this->request->getpost('email'),
                                
                                                             
                              ]);
        return redirect()->to(base_url().'clientes');

      } else {

        $data = ['titulo' => 'Agregar Cliente', 'validation' => $this->validator];

        echo view('header');
        echo view('clientes/nuevo', $data);
        echo view('footer');


      }
    }


    public function getEditar($id, $valid = null){


        $cliente = $this->clientes->where('id', $id)->first();

        if( $valid!= null ){
          $data = ['titulo' => 'Editar Cliente', 'datos' => $cliente, 'validation' => $valid];
        }else{
          $data = ['titulo' => 'Editar Cliente', 'datos' => $cliente];
        }

        echo view('header');
        echo view('clientes/editar', $data);
        echo view('footer');

    }

    public function postActualizar()    
         {
             if($this->request->is('post') && $this->validate($this->reglas)){

               $this->clientes->update($this->request->getPost('id'),[
                         'nombre' => $this->request->getpost('nombre'),
                         'direccion' => $this->request->getpost('direccion'),
                         'telefono' => $this->request->getpost('telefono'),
                         'email' => $this->request->getpost('email'),
                         
             ]);
               return redirect()->to(base_url().'clientes');
             }else{
              return $this -> getEditar($this->request->getPost('id'), $this->validator);
             }
         }

   
   
    public function getEliminar($id){

    $this->clientes->update($id,['activo' => 0]);
      return redirect()->to(base_url().'clientes');
   }

   public function getRestaurar($id){

    $this->clientes->update($id,['activo' => 1]);
      return redirect()->to(base_url().'clientes');
   }


   public function getEliminados($activo = 0)
   {
       $clientes = $this->clientes->where('activo',$activo)->findAll();
       $data = ['titulo' => 'Productos Eliminados', 'datos'=>$clientes];

       echo view('header');
       echo view('clientes/eliminados', $data);
       echo view('footer');
   }
 
}
