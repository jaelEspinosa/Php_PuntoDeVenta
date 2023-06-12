<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\UnidadesModel;

 class Unidades extends BaseController 
 
 {
    protected $unidades;

    public function __construct()

    {        
       $this->unidades = new UnidadesModel();

    }

    public function getIndex($activo = 1 )
    {
        $unidades = $this->unidades->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Unidades', 'datos'=>$unidades];

        echo view('header');
        echo view('unidades/unidades', $data);
        echo view('footer');
    }
    
    public function getNuevo(){

        $data = ['titulo' => 'Agregar Unidad'];

        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      if($this->request->getMethod() == 'post' && $this->validate(['nombre' => 'required', 'nombre_corto' => 'required'])){
        
        $this->unidades->save(['nombre' => $this->request->getpost('nombre'),'nombre_corto' => $this->request->getpost('nombre_corto') ]);
        return redirect()->to(base_url().'unidades');

      } else {

        $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];

        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer');


      }
    }


    public function getEditar($id){

        $unidad = $this->unidades->where('id', $id)->first();
        $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad];

        echo view('header');
        echo view('unidades/editar', $data);
        echo view('footer');

    }

    public function postActualizar()
    
    {
      $this->unidades->update($this->request->getPost('id'),['nombre' => $this->request->getpost('nombre'),'nombre_corto' => $this->request->getpost('nombre_corto') ]);
      return redirect()->to(base_url().'unidades');
    }

   public function getEliminar($id){

    $this->unidades->update($id,['activo' => 0]);
      return redirect()->to(base_url().'unidades');
   }

   public function getRestaurar($id){

    $this->unidades->update($id,['activo' => 1]);
      return redirect()->to(base_url().'unidades');
   }


   public function getEliminados($activo = 0)
   {
       $unidades = $this->unidades->where('activo',$activo)->findAll();
       $data = ['titulo' => 'Unidades Eliminadas', 'datos'=>$unidades];

       echo view('header');
       echo view('unidades/eliminados', $data);
       echo view('footer');
   }
 
}
