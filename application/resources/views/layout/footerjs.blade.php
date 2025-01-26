<!--ALL THIRD PART JAVASCRIPTS-->
<script src="public/vendor/js/vendor.footer.js?v={{ config('system.versioning') }}"></script>

<!--nextloop.core.js-->
<script src="public/js/core/ajax.js?v={{ config('system.versioning') }}"></script>

<!--MAIN JS - AT END-->
<script src="public/js/core/boot.js?v={{ config('system.versioning') }}"></script>

<!--EVENTS-->
<script src="public/js/core/events.js?v={{ config('system.versioning') }}"></script>

<!--CORE-->
<script src="public/js/core/app.js?v={{ config('system.versioning') }}"></script>

<!--BILLING-->
<script src="public/js/core/billing.js?v={{ config('system.versioning') }}"></script>

<!--project page charts-->
@if(@config('visibility.projects_d3_vendor'))
<script src="public/vendor/js/d3/d3.min.js?v={{ config('system.versioning') }}"></script>
<script src="public/vendor/js/c3-master/c3.min.js?v={{ config('system.versioning') }}"></script>
@endif


<script>
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


    function traeCursos(sede){

        curso=$("#cursox").val();
        var formData = new FormData();
        formData.append('sede', sede );
        formData.append('curso', curso );
        formData.append('_token', '{{ csrf_token() }}');
        
        $.ajax({
                    type: "POST",
                    url:  "{{ route('listadoProductos')}}",
                    data: formData,
                    contentType: false, //importante enviar este parametro en false
                    processData: false, //importante enviar este parametro en false
                    success: function (data) {
                            $("#mosprod").html(data);
                           
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        //alert('Ocurrio un error al ofertar ');
                    }
                });
        
        
    }
    
    function hsc(){
        traeCursos($("#lead_custom_field_2").val());
    }
    
    function sexo(sexo){
        if(sexo=="Masculino"){
           $("#mostemb").hide();    
        }else{
           $("#mostemb").show();     
        }
        
    }
    
    
</script>