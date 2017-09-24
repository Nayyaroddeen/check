<!doctype html>

<html>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

 Nayyar is here
 <body>
        <div class="c">
  
        <form action="/post/update" method="post">
        {{csrf_field()}}
        <textarea class="tinymce" id="summernote" name="info"></textarea>
        <input type="hidden" name="post_id" value="{{ $name->id }}">

        <input type="submit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>
        
        </div> 
        
 </body>

 <script src="{!!asset('/assets/dist/summernote.min.css')!!}"></script>
 
 <script src="{!!asset('/assets/dist/summernote.min.js')!!}"></script>
 <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote('code', {!! json_encode($name->body) !!});
        });
            </script>
</html>

