<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;

 class Usuarios extends BaseController 
 
 {
    protected $usuarios, $cajas, $roles;
    protected $reglas;

    public function __construct()

    {        
       $this->usuarios = new UsuariosModel();
       $this->cajas = new CajasModel();
       $this->roles = new RolesModel();

       helper(['form']);

       $this -> reglas = [
        'nombre' => [
            'rules' => 'required|is_unique[usuarios.usuario]',
            'errors' => [
              'required' => 'El {field}, es obligatorio',
              'is_unique' => 'El nombre del usuario ya está en uso'
        ]
        ],
        'password' => [
            'rules' => 'required',
            'errors' => [
              'required' => 'El {field}, es obligatorio'
          ]
        ],
        're_password' => [
            'rules' => 'required|matches[password]',
            'errors' => [
              'required' => 'El {field}, es obligatorio',
              'matches' => 'Las contraseñas no coinciden'
            ]
        ],
        'nombre' => [
            'rules' => 'required',
            'errors' => [
              'required' => 'El {field}, es obligatorio'
          ]
        ],
        'id_caja' => [
            'rules' => 'required',
            'errors' => [
              'required' => 'El {field}, es obligatorio'
           ]
       ],
        'id_role' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'El {field}, es obligatorio'
           ]
           ],  
      
      
      
      ];

    }

    public function getIndex($activo = 1 )
    {
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
    
        $data = ['titulo' => 'Usuarios', 'datos'=>$usuarios];

        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }
    
    public function getNuevo(){
      $cajas = $this->cajas->where('activo', 1)->findAll();
      $roles = $this->roles->where('activo', 1)->findAll();

        $data = ['titulo' => 'Agregar Usuario', 'cajas'=>$cajas, 'roles'=>$roles];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      if($this->request->is('post') && $this->validate($this->reglas)){
        /* if($this->request->getMethod() == 'post' && $this->validate($this->reglas)){ */
        $this->usuarios->save(['nombre' => $this->request->getpost('nombre'),'nombre_corto' => $this->request->getpost('nombre_corto') ]);
        return redirect()->to(base_url().'usuarios');

      } else {

        $data = ['titulo' => 'Agregar Unidad', 'validation' => $this->validator];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');


      }
    }


    public function getEditar($id, $valid = null){

        $unidad = $this->usuarios->where('id', $id)->first();

        if( $valid != null ){
          $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad, 'validation' => $valid];
        }else{
          $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');

    }

    public function postActualizar(){

      if($this->request->is('post')  && $this->validate($this->reglas)){
      $this->usuarios->update($this->request->getPost('id'),['nombre' => $this->request->getpost('nombre'),'nombre_corto' => $this->request->getpost('nombre_corto') ]);
      return redirect()->to(base_url().'usuarios');
      }else{
        return $this -> getEditar($this->request->getPost('id'), $this->validator);
      }
    }

   public function getEliminar($id){

    $this->usuarios->update($id,['activo' => 0]);
      return redirect()->to(base_url().'usuarios');
   }

   public function getRestaurar($id){

    $this->usuarios->update($id,['activo' => 1]);
      return redirect()->to(base_url().'usuarios');
   }


   public function getEliminados($activo = 0)
   {
       $usuarios = $this->usuarios->where('activo',$activo)->findAll();
       $data = ['titulo' => 'Usuarios Eliminadas', 'datos'=>$usuarios];

       echo view('header');
       echo view('usuarios/eliminados', $data);
       echo view('footer');
   }
 
}
