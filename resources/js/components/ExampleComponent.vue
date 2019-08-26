<template>
    <div class="container">
        <div class="row justify-content-center">
            
             <div class="row">
                                    <div class="col-lg-4">
                                            <div class="card">
                                                    <div class="card-body">
                                                            <div class="btn-group" role="group">
                                                                    <button  @click="listarVideo()" type="submit" class="btn btn-primary dropdown-toggle elegir">
                                                                      Categorias
                                                                    </button>
                                                                  
                                                                    
                                                                    <button type="button" class="btn btn-success elegir"><i class="ti-plus"></i> Live Event</button>
                                                                </div>
                                                            <div class="table-responsive">
                                                                    <table class="table table-sm m-0">
                                                                        <thead>
                                                                            <tr >
                                                                                <th>ID Video</th>
                                                                                <th>Nombre Video</th>
                                                                                <th>Length</th>
                                                                                <th>agregar</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr v-for="videos in arrayVideo.videos" :key="videos.id">
                                                                                <td v-text="videos.id"></td>
                                                                                <td v-text="videos.nombre_video"></td>
                                                                                <td v-text="videos.lenght"></td>
                                                                                <td>
                                                                                      <button @click="agregarDetalleVideo(videos)" class="btn btn-success form-control btnagregar"><i class="icon-plus">+</i></button>
                                                                                </td>
                                                                               
                                                                            </tr>
                                                                           
                                                                            
                                                                        </tbody>
                                                                    </table>
                        
                                                                </div>
                                                               
        
                                                    </div>
    
                                                            
                                           </div> 
                                    </div> 
                               
                                    <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                        <form class="" action="#">

                                                                <div class="form-group row ">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
                                                                        <div class="col-sm-10">
                                                                            <input class="form-control" type="text" value="" placeholder="Nombre Lista de Reproducción" id="example-text-input">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Canal</label>
                                                                            <div class="col-sm-10">
                                                                                    <select class="form-control">
                                                                                            <option>Seleccionar Canal</option>
                                                                                            <option>Large select</option>
                                                                                            <option>Small select</option>
                                                                                        </select>
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                            <label for="example-time-input" class="col-sm-2 col-form-label">Hora Inicio</label>
                                                                            <div class="col-sm-10">
                                                                                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                                <label for="example-date-input" class="col-sm-2 col-form-label">Emisión</label>
                                                                                <div class="col-sm-10">
                                                                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                                                                </div>
                                                                            </div>
                                                                
                                                                    <div class="form-group row col-sm-12">
                                                                        <label for="example-time-input" class=" col-form-label">Loop</label>
                                                                       
                                                                        <input type="checkbox" id="switch7" switch="info" checked/>
                                                                        <label class="loop" for="switch7" data-on-label="Si"
                                                                                data-off-label="No"></label>

                                                                                <label for="example-time-input" class=" col-form-label">AutoStart</label>
                                                                       
                                                                                <input type="checkbox" id="switch8" switch="info" checked/>
                                                                                <label class="loop" for="switch8" data-on-label="Si"
                                                                                        data-off-label="No"></label>
                                                                       
                                                                       
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                                Crear
                                                                            </button>
                                                                        
                                                                </div>
                                                                
                                                        </form>
                                                    
                                                                    <table class="table table-sm m-10 ">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Nombre de Vídeo</th>
                                                                                <th>Duración</th>
                                                                                <th> Eliminar</th>
                                                                                
                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="text-dark">
                                                                            <tr v-for="(videoDetalle,index) in arrayDetallePlaylist" :key="videoDetalle.id" class="table-primary">
                                                                                <td v-text="videoDetalle.id_video"></td>
                                                                                <td v-text="videoDetalle.nombre_video"></td>
                                                                                <td v-text="videoDetalle.lenght"></td>
                                                                                <td></td>
                                                                                <td>
                                                                                     <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" @click="eliminarDetalleVideo(index)" >
                                                                                        X
                                                                                    </button>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <h3>$ {{totalLength = calcularTotalLengthVideo}}</h3>
                                                                          

                                                                        </tbody>
                                                                    </table>
                        
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                            Guardar Lista
                                                                        </button>   
                                                                        <button type="submit" class="btn btn-dark waves-effect waves-light mr-1">
                                                                                <i class="ti-control-play"></i> Preview
                                                                            </button>      
                                                
                                                </div>

                                      
                                            </div>
                                    </div>
                            </div>
                 
        </div>
    </div>

</template>

<script>
    export default{
        data(){
            return{
                playlist_id : 0,
                id_video : 0,
                nombre_video : '',
                lenght: 0,
                usuario_id : 0,
                nombre_playlist: '',
                hora_inicio : 0,
                fecha_emision : 0,
                loop : 0,
                auto_start : 0,
                arrayPlaylist : [],
                arrayDetallePlaylist : [],
                arrayVideo : [],
                totalLength: 0
            }
        },
        methods: {
            listarVideo(){
                let esto = this;
                var url= '/videos/listarVideos';
                axios.get(url).then(function(response){
              
                    esto.arrayVideo = response.data
                    console.log(response);

                })
                .catch(function(error){
                    console.log(error);

                })
            },
            agregarDetalleVideo(data =[]){
                let esto = this;
                esto.arrayDetallePlaylist.push({
                    id_video : data['id'],
                    nombre_video : data['nombre_video'],
                    lenght : data['lenght']
           
                });
            },
            eliminarDetalleVideo(index){
                let esto = this;
                esto.arrayDetallePlaylist.splice(index,1);

            }
        },
            computed:{
             calcularTotalLengthVideo: function(){
                 var resultado = 0;
                 for(var i = 0; i<this.arrayDetallePlaylist.length; i++){
                     resultado = resultado + (this.arrayDetallePlaylist[i].lenght)
                 }

                  return resultado;
             }
           

        },
        mounted(){
            this.listarVideo();
        },
    
    }

</script>
