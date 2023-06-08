<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\CategoriasModel;

 class Categorias extends BaseController 
 
 {
    protected $categorias;

    public function __construct()

    {        
       $this->categorias = new CategoriasModel();

    }

    public function getIndex($activo = 1 )
    {
        $categorias = $this->categorias->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Categorias', 'datos'=>$categorias];

        echo view('header');
        echo view('categorias/categorias', $data);
        echo view('footer');
    }
    
    public function getNuevo(){

        $data = ['titulo' => 'Agregar Unidad'];

        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      $this->categorias->save(['nombre' => $this->request->getpost('nombre')]);
      return redirect()->to(base_url().'categorias');
    }


    public function getEditar($id){

        $unidad = $this->categorias->where('id', $id)->first();
        $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad];

        echo view('header');
        echo view('categorias/editar', $data);
        echo view('footer');

    }

    public function postActualizar()
    
    {
      $this->categorias->update($this->request->getPost('id'),['nombre' => $this->request->getpost('nombre') ]);
      return redirect()->to(base_url().'categorias');
    }

   public function getEliminar($id){

    $this->categorias->update($id,['activo' => 0]);
      return redirect()->to(base_url().'categorias');
   }

   public function getRestaurar($id){

    $this->categorias->update($id,['activo' => 1]);
      return redirect()->to(base_url().'categorias');
   }


   public function getEliminados($activo = 0)
   {
       $categorias = $this->categorias->where('activo',$activo)->findAll();
       $data = ['titulo' => 'Categorias Eliminadas', 'datos'=>$categorias];

       echo view('header');
       echo view('categorias/eliminados', $data);
       echo view('footer');
   }
 
}
