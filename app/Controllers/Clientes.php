<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
use App\Models\ClientesModel;

 class Clientes extends BaseController 
 
 {
    protected $clientes;
 



    public function __construct()

    {        
       
       $this->clientes = new ClientesModel();

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
      if($this->request->getMethod() == 'post' && $this->validate(['nombre' => 'required'])){
        
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


    public function getEditar($id){


        $cliente = $this->clientes->where('id', $id)->first();
        $data = ['titulo' => 'Editar Cliente', 'datos' => $cliente];

        echo view('header');
        echo view('clientes/editar', $data);
        echo view('footer');

    }

    public function postActualizar()    
         {
              $this->clientes->update($this->request->getPost('id'),[
                        'nombre' => $this->request->getpost('nombre'),
                        'direccion' => $this->request->getpost('direccion'),
                        'telefono' => $this->request->getpost('telefono'),
                        'email' => $this->request->getpost('email'),
                        
            ]);
              return redirect()->to(base_url().'clientes');
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
