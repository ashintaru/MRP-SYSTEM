@extends('layouts.app')
@extends('layouts.header')
@section('container')
<body>
  <div class="container my-12 mx-auto px-4 md:px-6">
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
      <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-1 md:w-1/2 mx-1">
          <div class="p-4 flex flex-col">
                 <p id="totalPending" class="text-white text-2xl"></p>
                  <p class="no-underline text-white text-lg">Total Pending Order</p>
          </div>
      </div>
      <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-1 md:w-1/2 mx-1">
        <div class="p-4 flex flex-col">
               <p id="percentPending" class="text-white text-2xl"> %</p> 
                <p class="no-underline text-white text-lg">Percent of Pending Order</p>
        </div>
      </div>
      <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-1 md:w-1/2 mx-1">
      <div class="p-4 flex flex-col">
          <p id="percentSuccess" class="text-white text-2xl"> %</p> 
          <p class="no-underline text-white text-lg">Percent of Success Order</p>
        </div>
    </div>
    <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-1 md:w-1/2 mx-1">
        <div class="p-4 flex flex-col">
          <p id="totalSuccess" class="text-white text-2xl"></p>
          <p class="no-underline text-white text-lg">Total Succsess Order</p>
        </div>
    </div>
  </div>
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
      <div class="my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <canvas id="myChart1"></canvas>
      </div>
      <div class="md:w-1/3">
        <canvas id="myChart3"></canvas>
      </div>
      <div class="my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <canvas id="myChart2"></canvas>
      </div> 
      <button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
        Create New Model 
      </button>
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Material Name
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Order Quantity
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Transmited to Inventory
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Order Status
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Order by
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Order From
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Order Deliver
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @if($lists != null)
            @foreach($lists as $list)
            <tr class="border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$index++}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$list['materialCode']}}</td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['orderQtty']}}</td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['orderTrans']}}</td>
                @if($list['orderStatus']==1)
                      <td class="font-medium px-6 py-4 whitespace-nowrap">
                        <span class="bg-blue-500 hover:bg-blue-900  rounded-full  px-1 py-1 text-white">
                          Success
                        </span>
                      </td>
                @else
                      <td class="text-sm text-red-900 font-medium px-6 py-4 whitespace-nowrap">
                        <span class="bg-red-500 hover:bg-red-900  rounded-full  px-1 py-1 text-white">
                          Pending
                        </span>
                      </td>
                @endif
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['personLastName'] }}</td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['vendorName']}}</td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['orderDate']}}</td>
              
                <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                    @if($list['orderStatus']==0)
                        <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ URL('modifyOrder', ['key1' => $list['orderNo']] )}}" >Modify 
                          <i class="fa fa-pen"></i>
                        </a>
                        <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ URL('approveOrder', ['key1' => $list['orderNo']] )}}" >Approve 
                          <i class="fa fa-thumbs-up"></i>
                        </a>
                        <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ URL('deleteComponent', ['key1' => $list['orderNo'] ] )}}" >Remove <i class="fa fa-trash"></i></a>
                    @endif
                   @if($list['orderStatus']==1)
                      <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ URL('approveOrder', ['key1' => $list['orderNo']] )}}" >Re - Approve 
                        <i class="fa fa-recycle"></i></a>
                    @endif
                </td>
              </tr>
            @endforeach
            @else
            <td>
              <span>No record Found</span>
            </td>
          @endif
          </tbody>
        </table>
      </div>

      <div class="flex p-3">
        @if($lists != null)
          {{$lists->links()}} 
        @endif
      </div>
    </div>
  </div>
    <div class="sbg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
        <div class="bg-gray-200 max-w-lg py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Adding New Components </h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div >
              <form action = "{{URL('showOrderList', ['key1' => $order['orderListId']] )}}" method="POST">
                @csrf
              <div class="grid grid-cols-2 grid-rows-4 items-center place-content-center space-y-5">
                      <div class="col-span-2"><span>Material Info</span></div>
                      <div class="col-span-1">
                        <span>Material Set </span>
                    </div> 
                      <div class="col-span-4">
                        @if($materials == null)
                        <select disabled name="models"> No Records</select>
                        @else
                          <select name="material" class=" block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            @foreach($materials as $mat)
                              @if($mat['materialId'] == old('material')){
                                <option value="{{$mat['materialId']}}" selected="select">{{$mat['materialCode']}}</option>
                              }
                              @else
                                <option value="{{$mat['materialId']}}">{{$mat['materialCode']}}</option>
                              @endif
                            @endforeach
                          </select>
                          @endif
                      </div>
                      <div class="col-span-2">
                        <p> Material Set Quantity: </p>
                      </div> 
                      <div class="col-span-2">
                        <input class="border-2 inputBox border-blue-500" required="true" type="number" min="0" max="9999" value="{{ old('qtty') }}" name="qtty">
                      </div>       
                  
                      <div class="col-span-4">
                        <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                      </div>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
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

            const overlay = document.querySelector('#overlay')
            const delBtn = document.querySelector('#delete-btn')
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            delBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)
            
            //dropdown
            const menuBtn = document.querySelector('#menu-btn')
            const dropdown = document.querySelector('#dropdown')
            
            menuBtn.addEventListener('click', () => {
                dropdown.classList.toggle('hidden')
                dropdown.classList.toggle('flex')
            })
       
        })

        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });

            const inventory = {!! json_encode($data4 , JSON_HEX_TAG) !!};
            const labeL1 = [];
            const labeL2 = [];
            const data1 = [];
            const data2 = []; 
            console.log(inventory);
            for (const x in inventory) {
              if(inventory[x].orderStatus == 0){
                labeL1[labeL1.length] = inventory[x].materialCode;
                data1[data1.length] = inventory[x].orderQtty;
              }else{
                labeL2[labeL2.length] = inventory[x].materialCode;
                data2[data2.length] = inventory[x].orderTrans;                            
              }
            }

            let totalPending = 0;
            let totalSucess = 0;
            let totalOrder = 0;
           
            let averagePending = 0;
            let averageSucces = 0; 
            let average = [];

            for (const i in data1) {
              // totalpending += totalpending + data1[i];
              totalPending += data1[i];
            }
            for (const i in data2) {
              // totalpending += totalpending + data1[i];
              totalSucess += data2[i];
            }

            totalOrder = totalPending + totalSucess; 
            averagePending = totalPending / totalOrder * 100; 
            averageSucces = totalSucess / totalOrder * 100;

            average.push(averagePending);
            average.push(averageSucces);
            

            $('#totalPending').text(totalPending);
            $('#totalSuccess').text(totalSucess);

            $('#percentPending').text(averagePending.toFixed(2));
            $('#percentSuccess').text(averageSucces.toFixed(2));
            console.log(average);

      const ctx1 = document.getElementById('myChart1').getContext('2d');
      const ctx2 = document.getElementById('myChart2').getContext('2d');
      const ctx3 = document.getElementById('myChart3').getContext('2d');
    
      const myChart = new Chart(ctx1, {
          type: 'bar',
          data: {
              labels: labeL1,
              datasets: [{
                  label: '# of Pending Orders',
                  data: data1,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      }); 

      const myChart2 = new Chart(ctx2, {
          type: 'bar',
          data: {
              labels: labeL2,
              datasets: [{
                  label: '# of Success Orders',
                  data: data2,
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.2)'
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      }); 

      const myChart3 = new Chart(ctx3, {
          type: 'doughnut',
          data: {
              labels: ['Pending','Success'],
              datasets: [{
                  label: '# of Success Orders',
                  data: average,
                  backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                  ],
                  hoverOffset: 4,
              }]
          }
      }); 
 
  

    });
    </script>

  @endsection
  