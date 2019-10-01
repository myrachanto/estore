@extends('master')
@section('header1')
    <meta name="description" content="{{$blog -> meta}}" />
	<title>{{$blog -> title}}</title>
@endsection

@section('content')<BR/>
<div id="about" class="container-fluid alterdiv1">
  
  <div class="col-sm-4"><br />
      <a href="{{$blog ->foto}}" ><img src="{{URL::asset($blog ->foto)}}" class="img-responsive" alt="{{$blog -> name}}" /></a>
    </div>
    <div class="col-sm-8">
      <h1>{{$blog -> title}}</h1><br>
       <p>{{$blog -> comment1}}</p>
    </div>
    
      </div>
<div id="about" class="container-fluid carodiv3">
    <div class="col-sm-8">
            <h3><strong><u>{{$blog -> header1}}</u></strong></h3><br>
        
      <p>{{$blog -> comment2}}</p>
      <h3><strong><u>{{$blog -> header2}}</u></strong></h3><br>
      <p>{{$blog -> comment3}}</p>
      
      <h3><strong><u>{{$blog -> header3}}</u></strong></h3><br>
      <p>{{$blog -> comment4}}</p><br>

      <p>{{$blog -> summary}}</p>
      For more information visit <a href="{{$blog -> url}}">{{$blog -> url}}</a>
      or  <a href="{{$blog -> url2}}">{{$blog -> url2}}</a>
      <p>Share on</p>
        <p><ul class="share-buttons">
  <li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Facebook" src="{{asset('img/social_flat_rounded_rects_svg/Facebook.svg')}}" ></a></li>
  <li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img alt="Tweet" src="{{asset('img/social_flat_rounded_rects_svg/Twitter.svg')}}"></a></li>
  <li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Google+" src="{{asset('img/social_flat_rounded_rects_svg/Google+.svg')}}"></a></li>
  <li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img alt="Pin it" src="{{asset('img/social_flat_rounded_rects_svg/Pinterest.svg')}}"></a></li>
  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Share on LinkedIn" src="{{asset('img/social_flat_rounded_rects_svg/LinkedIn.svg')}}"></a></li>
</ul></p>
      <div id="disqus_thread"></div>
      <div id="ads">ads</div>
    </div>
    <div class="col-sm-4"><h3>Articles on the blog</h3><ul>
    @foreach($blognav as $blog)
            <li class ="carodiv3"><a href="{{url('/blog')}}/{{$blog -> name}}"><img src="{{URL::asset($blog ->foto)}}" width="50" alt="{{$blog -> name}}" />{{$blog->title}}</a><br />
            Posted by: Myrachanto @ {{$blog->created_at->diffForHumans()}}</li><hr />
         @endforeach</ul>
         <br />
         </div>
    </div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://chantoswebdevelopers.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection