<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use App\Models\CategoriasModel;
 use App\Models\ProductosModel;
 use App\Models\UnidadesModel;

 class Productos extends BaseController 
 
 {
    protected $productos;
    protected $unidades;
    protected $categorias;
    protected $reglas;
    protected $reglasEdit;


    public function __construct()

    {        
       $this->productos = new ProductosModel();
       $this->unidades = new UnidadesModel();
       $this->categorias = new CategoriasModel();

       helper(['form']);

       $this -> reglas = [
        'codigo' => [
        'rules' => 'required|is_unique[productos.codigo]',
        'errors' => [
          'required' => 'El {field}, es obligatorio.',
          'is_unique' => 'El {field}, ya está en uso.'
        ]
        ],
        'nombre' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El {field}, es obligatorio'
          ]
        ],
        'id_unidad' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El tipo de unidad, es obligatorio'
          ]
        ],
        'id_categoria' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El tipo de categoria, es obligatorio'
          ]
        ],
        'precio_venta' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El precio de venta, es obligatorio'
          ]
        ],
        'precio_compra' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El el precio de compra, es obligatorio'
          ]
        ],
        'stock_minimo' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El stock mínimo, es obligatorio'
          ]
        ],
      
      
      
      ];
      $this -> reglasEdit = [
        'codigo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'El {field}, es obligatorio.'
          
        ]
        ],
        'nombre' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El {field}, es obligatorio'
          ]
        ],
        'id_unidad' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El tipo de unidad, es obligatorio'
          ]
        ],
        'id_categoria' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El tipo de categoria, es obligatorio'
          ]
        ],
        'precio_venta' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El precio de venta, es obligatorio'
          ]
        ],
        'precio_compra' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El el precio de compra, es obligatorio'
          ]
        ],
        'stock_minimo' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'El stock mínimo, es obligatorio'
          ]
        ],
      
      
      
      ];

    }

    public function getIndex($activo = 1 )
    {
        $productos = $this->productos->where('activo',$activo)->findAll();
        
        $data = ['titulo' => 'Productos', 'datos'=>$productos];

        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');
    }
    
    public function getNuevo(){
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');

    }

    public function postInsertar()
    
    {
      if($this->request->is('post')  && $this->validate($this->reglas)){
        
        $this->productos->save(['codigo' => $this->request->getpost('codigo'),
                                'nombre' => $this->request->getpost('nombre'),
                                'id_unidad' => $this->request->getpost('id_unidad'),
                                'id_categoria' => $this->request->getpost('id_categoria'),
                                'precio_venta' => $this->request->getpost('precio_venta'),
                                'precio_compra' => $this->request->getpost('precio_compra'),
                                'stock_minimo' => $this->request->getpost('stock_minimo'),
                                'inventariable' => $this->request->getpost('inventariable'),
                              
                              ]);
        return redirect()->to(base_url().'productos');

      } else {
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Producto', 'unidades' => $unidades, 'categorias' => $categorias, 'validation' => $this->validator];

       

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');


      }
    }


    public function getEditar($id, $valid = null){

      $categorias = $this->categorias->where('activo', 1)->findAll();
      $unidades = $this->unidades->where('activo', 1)->findAll();
        $producto = $this->productos->where('id', $id)->first();

        if($valid!=null){
          $data = ['titulo' => 'Editar Producto', 'datos' => $producto, 'categorias' => $categorias, 'unidades'=>$unidades, 'validation' => $valid ];
        }else{
          $data = ['titulo' => 'Editar Producto', 'datos' => $producto, 'categorias' => $categorias, 'unidades'=>$unidades ];
        }



        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');

    }

    public function postActualizar()    
         {
            if($this->request->is('post')  && $this->validate($this->reglasEdit)){
              $this->productos->update($this->request->getPost('id'),[
                                              'codigo' => $this->request->getpost('codigo'),
                                              'nombre' => $this->request->getpost('nombre'),
                                              'id_unidad' => $this->request->getpost('id_unidad'),
                                              'id_categoria' => $this->request->getpost('id_categoria'),
                                              'precio_venta' => $this->request->getpost('precio_venta'),
                                              'precio_compra' => $this->request->getpost('precio_compra'),
                                              'stock_minimo' => $this->request->getpost('stock_minimo'),
                                              'inventariable' => $this->request->getpost('inventariable'),
            ]);
              return redirect()->to(base_url().'productos');
          }else{
            return $this -> getEditar($this->request->getPost('id'), $this->validator);
          }
         }

   
   
         public function getEliminar($id){

    $this->productos->update($id,['activo' => 0]);
      return redirect()->to(base_url().'productos');
   }

   public function getRestaurar($id){

    $this->productos->update($id,['activo' => 1]);
      return redirect()->to(base_url().'productos');
   }


   public function getEliminados($activo = 0)
   {
       $productos = $this->productos->where('activo',$activo)->findAll();
       $data = ['titulo' => 'Productos Eliminados', 'datos'=>$productos];

       echo view('header');
       echo view('productos/eliminados', $data);
       echo view('footer');
   }
 
}
