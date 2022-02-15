$(document).ready(function(){
    
    let editar=false;
    $('#empresul').hide();
    obtenertabla();
    //buscar
    $('#buscar').keyup(function(){
        if($('#buscar').val()){
            let buscar=$('#buscar').val();
            $.ajax({
                url:'buscar-empleados.php',
                type:'POST',
                data: {buscar},
                success:function(response){
                    let datos= JSON.parse(response);
                    console.log(response);
                    let template='';
                    datos.forEach(datos=>{
                        template +=`<li>
                        ${datos.nombresp}
                        </li>`
                    });
                    $('#container').html(template);
                    $('#empresul').show();
                }
            })
        }
    })
    //añadir
    $('#empleados-form').submit(function(e){
        const datosPost={
            nombresp:$('#nombresp').val(),
            apellidosp:$('#apellidosp').val(),
            cargo:$('#cargo').val(),
            id: $('#perid').val()
        }
        let url= editar===false ? 'agregar.php': 'editar2.php';
        $.post(url,datosPost, function(response){
            console.log(response);
            obtenertabla();
            $('#empleados-form').trigger('reset')
            

        })
        
        e.preventDefault();
        

    })
    //tabla
    function obtenertabla(){
        $.ajax({
            url:'tabla.php',
            type:'GET',
            success:function(response){
                    let datos= JSON.parse(response);
                        console.log(response);
                        let template='';
                        datos.forEach(datos=>{
                            template +=`<tr btnid="${datos.id}">
                            <td>${datos.id}</td>
                            <td>
                            <a href="#" class="editaritem">${datos.nombresp}</a>
                            </td>
                            <td>${datos.apellidosp}</td>
                            <td>${datos.cargo}</td>
                            <td>
                            <button class="btn-elimi btn btn-danger"> Eliminar</button>
                            </td>
    
                            </tr>`
                        });
                        $('#empleado').html(template);
            }
    
        })
    }
    //eliminar
    $(document).on('click','.btn-elimi',function(){
        if(confirm('¿Deseas eliminar este registro?')){
            let element =$(this)[0].parentElement.parentElement;
        let id= $(element).attr('btnid');
        $.post('eliminar.php',{id},function(response){
            obtenertabla();
        })
        }
        
    });
    //editar
    $(document).on('click','.editaritem',function(){
        let element=$(this)[0].parentElement.parentElement;
        let id= $(element).attr('btnid');
        $.post('editar1.php',{id},function(response){
            const persona=JSON.parse(response);
            $('#nombresp').val (persona.nombresp);
            $('#apellidosp').val (persona.apellidosp);
            $('#cargo').val (persona.cargo);
            $('#perid').val (persona.id);
            editar=true;

        })

        
    });

    
});