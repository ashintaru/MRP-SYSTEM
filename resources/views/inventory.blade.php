@extends('layouts.app')
@extends('layouts.header')
@section('container')
    @livewire('inventory')
@endsection
<script>
    window.addEventListener('DOMContentLoaded', () =>{
          var count = document.querySelectorAll('input.inputBox').length;
          console.log(count);
          
          var inputBox = document.getElementsByClassName("inputBox");
              var invalidChars = ["-","+","e","E"];
          for(let i = 0; i < count ; i++){
              inputBox[i].addEventListener("keydown", function(e) {
              if (invalidChars.includes(e.key)) {
                  e.preventDefault();
              }
              });
          }


        // const targetEl = document.getElementById("authentication-modal");
        // // options with default values
        // const options = {
        // placement: 'bottom',
        // backdropClasses: "false",
        // onHide: () => {
        // },
        // onShow: () => {
        //     console.log('modal is shown');
        // },
        // onToggle: () => {
        //     console.log('modal has been toggled');
        // }
        // };

        // const modal = new Modal(targetEl, options);
        // window.livewire.on("modify",()=>{
        //     modal.remove();
        // })

    });
</script>