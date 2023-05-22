<div>
    @include('layouts.header')
    <div class="container my-12 mx-auto justify-around">
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
              <li class="inline-flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                  <span class="ml-1 text-sm font-medium text-black md:ml-2 ">Order Management</span>
              </li>
              <li >
                <div class="flex items-center">
                <a href="{{URL('list')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-black">Order List</span>
                </a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Monthly Report</span>
                </div>
              </li>
            </ol>
        </nav>
        <div class="my-6 flex flex-row justify-between items-center">
            <a target="_blank" href="{{URL('monthly-order-report', ['listId' => $listid] )}}" id="add" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    <span>Print Report </span>
            </a>                               
            <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Print Report
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>  
        </div>
      <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 shadow-2xl border-2 p-1 rounded-lg bg-white">
          <div class="shadow-lg bg-red-600 border-l-8 hover:bg-red-500 mb-2 p-1 md:w-1/2 mx-1">
              <div class="p-4 flex flex-col">
                  <p id="totalPending" class="text-white text-2xl"></p>
                      <p class="no-underline text-white text-lg">Total Pending Order</p>
              </div>
          </div>
          <div class="shadow-lg  bg-red-600 border-l-8 hover:bg-red-500 mb-2 p-1 md:w-1/2 mx-1">
              <div class="p-4 flex flex-col">
                      <p id="percentPending" class="text-white text-2xl"> %</p> 
                      <p class="no-underline text-white text-lg">Percent of Pending Order</p>
              </div>
          </div>
          <div class="shadow bg-blue-600 border-l-8 hover:bg-blue-500 mb-2 p-1 md:w-1/2 mx-1">
              <div class="p-4 flex flex-col">
                  <p id="percentSuccess" class="text-white text-2xl"> %</p> 
                  <p class="no-underline text-white text-lg">Percent of Success Order</p>
              </div>
          </div>
          <div class="shadow bg-blue-600 border-l-8 hover:bg-blue-500 mb-2 p-1 md:w-1/2 mx-1">
              <div class="p-4 flex flex-col">
                  <p id="totalSuccess" class="text-white text-2xl"></p>
                  <p class="no-underline text-white text-lg">Total Succsess Order</p>
              </div>
          </div>
      </div>

      <div class="flex py-10 ">
          <div class=" flex-col px-6 py-6 bg-white text-gray-800 min-w-full shadow-2xl border-2 p-1 rounded-3xl">
              <div class="flex justify-center text-2xl">
                  <p> Order Report</p>
              </div>
              <div class=" flex items-center justify-center ">
                  <div class=" text-gray-800 overflow-auto">
                      <canvas id="myChart1"></canvas>
                  </div>
                  <div class=" min-w-100">
                      <canvas id="myChart3"></canvas>
                  </div>
                  <div class="overflow-auto">
                      <canvas id="myChart2"></canvas>
                  </div>           
              </div>
          </div>
      </div>

      <div class="overflow-x-auto pt-3 rounded-xl shadow-2xl">
        <table class="min-w-full bg-white  rounded-xl ">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Material Name
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Quantity
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Order From
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Order Deliver
              </th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @if($lists != null)
            @foreach($lists as $list)
            <tr class="border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{$index++}}
              </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          {{$list->materialCode}}
                </td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['orderQtty']}}</td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['vendorName']}}</td>
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['orderDate']}}</td>
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
</div>
