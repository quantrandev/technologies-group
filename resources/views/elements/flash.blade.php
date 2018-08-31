<script type="text/javascript">
  @foreach($messages as $message)
    var messageType = '{{$message['type']}}';
    switch(messageType){
      case 'success': 
        toastr.success('{{$message['text']}}');
    }
   @endforeach

</script>