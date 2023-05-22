@extends('layouts.app')
@extends('layouts.header')
@section('container')
  @livewire('components',['id'=>$id])
@endsection
 <script>
  window.addEventListener('DOMContentLoaded', () =>{
      var count = document.querySelectorAll('input.inputBox').length;
      var inputBox = document.getElementsByClassName("inputBox");
          var invalidChars = ["-","+","e","E"];
      for(let i = 0; i < count ; i++){
          inputBox[i].addEventListener("keydown", function(e) {
          if (invalidChars.includes(e.key)) {
              e.preventDefault();
          }
          });
      }  
  })
  // alert("hi");
</script>