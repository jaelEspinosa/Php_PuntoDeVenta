<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\CategoriasModel;

 class Categorias extends BaseController 
 
 {
    protected $categorias;
    protected $reglas;

    public function __construct()

    {        
       $this->categorias = new CategoriasModel();

       helper(['form']);

       $this -> reglas = [
        'nombre' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El {field}, es obligatorio'
        ]
        ]           
      ];

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

        $data = ['titulo' => 'Agregar Categoria'];

        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      if($this->request->is('post')  && $this->validate($this->reglas)){
        $this->categorias->save(['nombre' => $this->request->getpost('nombre')]);
        return redirect()->to(base_url().'categorias');
      }else{
        $data = ['titulo' => 'Categorias', 'validation' => $this->validator];

        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer');
      }
    }
        


    public function getEditar($id, $valid = null){

        $unidad = $this->categorias->where('id', $id)->first();
        if($valid!=null){
          $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad, 'validation' => $valid];
        }else{
          $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('categorias/editar', $data);
        echo view('footer');

    }

    public function postActualizar()
    
    {
      if($this->request->is('post')  && $this->validate($this->reglas)){
      $this->categorias->update($this->request->getPost('id'),['nombre' => $this->request->getpost('nombre') ]);
      return redirect()->to(base_url().'categorias');
      }else{
        return $this -> getEditar($this->request->getPost('id'), $this->validator);
      }
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
