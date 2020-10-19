@isset($setting)
    <label for="">@lang('base.Foto actual')</label>       <br>           
    <img width="320px"height="300px;" src="{{asset($setting)}}" alt="">
   <br>
   <a href="" id="delete_resource" style="color: darkred"><i class="fas fa-trash ml-1"></i> @lang('base.Quitar recurso')</a>
@endisset
   
