<div class="">
    <div class="flex-col ">
        <div class="items-center justify-between"> 
             <span> User Name</span> 
             <span>
                {{$profile->accUserName}}
             </span>
        </div>
        <div class="items-center justify-between"> 
            <span> First Name</span> 
            <span>
               {{$profile->fName}}
            </span>
       </div>
       <div class="items-center justify-between"> 
        <span> Last Name</span> 
        <span>
           {{$profile->lName}}
        </span>
     </div>
   <div class="items-center justify-between"> 
    <span> Account Type</span> 
    <span>
       @if(session('type')=='admin')
         ADMINISTRATOR
       @else
         Staff
      @endif
    </span>
</div>
        <div> 
        </div>
    </div>
</div>
