<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>

        <div class="container">
            <div class="mt-5">
                <select class="form-control countryCategory" name="country" id="country">
                    <option selected disabled>Choose a Country</option>

                    @foreach ($countries as $country)
                        <option value="{{$country->id}}"> {{ $country->countryDesc }}</option>   
                    @endforeach     
                </select>    
            </div>
        
            <div class="mt-5">
                <select class="form-control stateCategory" name="state" id="state">
                    <option selected="false">Choose a State</option>
                </select>    
            </div>
        
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $(document).on('change', '.countryCategory', function(){
                    //console.log("changed")

                    var country_id = $(this).val();
                    var div = $("body").parent();
                    var op="";

                    $.ajax({
                        type: 'get',
                        url: "{!!URL::to('findState')!!}",
                        data: {
                            'id': country_id
                        },
                        success:function(data){
                            console.log('success');
                            console.log(data);

                            op+= '<option value="0" selected disabled>Choose a State</option>';

                            for(var i=0; i<data.length; i++){
                                op+='<option value="'+data[i].id+'">'+data[i].stateDesc+'</option>';
                            }

                            div.find('#state').html(" ");
                            div.find('#state').append(op);
                        },
                        error: function(){

                        }
                    })
                });

            });
        </script>

        
        

    </body>
</html>
