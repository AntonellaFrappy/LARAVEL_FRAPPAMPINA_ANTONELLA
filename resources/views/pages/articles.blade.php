<x-layout :title="$title">   
@if($titleIsVisible)
     <h1 class="title">{{$title}}</h1>
@else
     <h1>La variabile $titleisVisible è false </h1>
@endif
<div class="container">
    <div class="row g-3 mt-5">
        @foreach($articles as $article)
        @if($article['visible'])
    
        
        
        <div class="col-lg-3">
            <x-card 
            :category="$article->category"
            :title="$article->title"
            :route="route('articles.show',$article->id)"
      />
    
    </div>
       @endif
@endforeach     
             
         
        
</div>
    
</div>
</x-layout>

 
    

    
        
    
       
        

