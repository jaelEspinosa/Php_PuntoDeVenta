<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\UnidadesModel;

 class Unidades extends BaseController 
 
 {
    protected $unidades;
    protected $reglas;

    public function __construct()

    {        
       $this->unidades = new UnidadesModel();

       helper(['form']);

       $this -> reglas = [
        'nombre' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El {field}, es obligatorio'
        ]
        ],
        'nombre_corto' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El {field}, es obligatorio'
          ]
          ],
      
      
      
      ];

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
      if($this->request->getMethod() == 'post' && $this->validate($this->reglas)){
        
        $this->unidades->save(['nombre' => $this->request->getpost('nombre'),'nombre_corto' => $this->request->getpost('nombre_corto') ]);
        return redirect()->to(base_url().'unidades');

      } else {

        $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];

        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer');


      }
    }


    public function getEditar($id, $valid = null){

        $unidad = $this->unidades->where('id', $id)->first();

        if( $valid != null ){
          $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad, 'validation' => $valid];
        }else{
          $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('unidades/editar', $data);
        echo view('footer');

    }

    public function postActualizar(){

      if($this->request->getMethod() == 'post' && $this->validate($this->reglas)){
      $this->unidades->update($this->request->getPost('id'),['nombre' => $this->request->getpost('nombre'),'nombre_corto' => $this->request->getpost('nombre_corto') ]);
      return redirect()->to(base_url().'unidades');
      }else{
        return $this -> getEditar($this->request->getPost('id'), $this->validator);
      }
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
