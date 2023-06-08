


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>

                        <div>
                            <p>
                                <a href="<?php echo base_url()?>categorias/nuevo" class="btn btn-info btn-sm">Agregar</a>
                                <a href="<?php echo base_url()?>categorias/eliminados" class="btn btn-warning btn-sm">Eliminados</a>
                            </p>
                        </div>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Listado de <?php echo$titulo; ?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                          
                                            <th>Acc.</th>
                                            
                                         
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                       <?php foreach($datos as $dato) { ?>
                                        <tr>
                                            <td><?php echo $dato['id']?></td>
                                            <td><?php echo $dato['nombre']?></td>
                                            
                                            <td><?php $dato['id']?>
                                            <div class="d-flex justify-content-evenly">
                                                <a href="<?php echo base_url()?>/categorias/editar/<?php echo $dato['id']?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo base_url()?>/categorias/eliminar/<?php echo $dato['id']?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                            </td>
                                           
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                  
                </main>