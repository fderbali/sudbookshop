@extends('maincontent')

@section('main')
    @foreach ($sections as $section)
        <div class="section_title" data-section_id="{{ $section->id }}">{{ $section->name }}</div>
        <div class="titre_categorie"></div>
    @endforeach    
    {!! $links !!}
<script>
    $(document).ready(function(){
        $(".section_title").click(function(){
            divlinks = $(this).next();
            if(divlinks.is(":visible")){
                divlinks.animate({"margin-left":"3000px"},400)
                divlinks.slideUp();
            }
            else{
                if(!(divlinks.is(":empty"))){
                    divlinks.show();divlinks.animate({"margin-left":"50px"},400);console.log('je passe ici 1');
                }
                else{
                    console.log('je passe ici 2');
                    section_id = $(this).data("section_id");
                    $.ajax({
                        method: "GET",
                        url: "catalogue/section/"+section_id,
                    })
                    .done(function(data) {
                        categories = JSON.parse(data);
                        for(var key in categories){
                            link = '<a href="">'+categories[key].name+'</a>';
                            divlinks.append(link);
                        }
                        divlinks.show();divlinks.animate({"margin-left":"50px"},400)                    
                    });
                }
            }
        });        
    });
</script>
@endsection


