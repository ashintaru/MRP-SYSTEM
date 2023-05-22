<div>
    @include('layouts.header')
      {{-- @include('livewire.material-edit-form') --}}
      <div class="container mx-auto  md:px-12 p-6 bg-transparent">
          <div class="overflow-x-auto relative">
                 <div class="container my-1 mx-auto px-4 md:px-6">
                  <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                      <ol class="inline-flex items-center space-x-1 md:space-x-3">
                      <li class="inline-flex items-center">
                          <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                          Inventory Management
                          </a>
                      </li>
                      <li aria-current="page">
                        <a href="{{URL('inventory')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> Material</span>
                            </a>
                    </li>
                      <li aria-current="page">
                          <div class="flex items-center">
                          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> Report</span>
                          </div>
                      </li>
                      </ol>
                  </nav>
                    <div class="flex justify-between items-center ml-3">
                        <div class="my-6 flex flex-grow justify-items-end items-end space-x-3">
                        <a target="_blank" href="{{URL('inventory-PDF')}}" id="add" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl duration-300"  data-tooltip-target="tooltip-top" >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            <span>Print Report </span>
                        </a>                               
                        <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Generate Report
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>  
            
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                       <span> Issued in {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format(' F d Y')}} </span>
                    </div>
                    <div class=" mb-2 p-2 md:w-1/1 mx-2 bg-white rounded-lg items-end ">
                        <canvas id="myChart1"></canvas>    
                    </div> 

                    <div class="overflow-x-auto">
                        <table class="border-1 border-black w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="border-black border-1 text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-400 dark:text-gray-400 ">
                              <tr class="">
                                <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                                  Invntory Number
                                </th>
                                <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                                  Date Created
                                </th>
                                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                                  Material Code
                                </th>
                                <th s cope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                                  Quantity
                                </th>
                              </tr>
                            </thead>
                            <tbody class=" bg-white">
                              @if($list != null)
                              @foreach($list as $li)
                                  <tr class="border-b">
                                      <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >Inv#{{$li->inventoryId}}</td>
                                      <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">                 
                                          {{ \Carbon\Carbon::createFromFormat('Y-m-d', $li->invCreated)->format(' F d Y')}}
                                      </td>
                                      <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$li->materialCode}}</td>
                                      <td  class="text-sm text-black font-medium whitespace-nowrap">
                                        {{$li->currentQtty}} 
                                      </td>
                                  </tr>
                              @endforeach
                          @else
                          <tr class="border-b">
                            <p>data table are empty</p>
                          </tr>
                        @endif
                            </tbody>
                          </table>
                    </div>
                 </div>    

          </div>
      </div>
      <script>

        $(document).ready(function () {

            const inventory = {!! json_encode($list , JSON_HEX_TAG) !!};
            const labeL1 = [];
            const data1 = [];
            const color =[];
            
            generatePastelColor = () => {
                    let R = Math.floor((Math.random() * 127) + 127);
                    let G = Math.floor((Math.random() * 127) + 127);
                    let B = Math.floor((Math.random() * 127) + 127);
                    
                    let rgb = (R << 16) + (G << 8) + B;
                    return `#${rgb.toString(16)}`;      
                    }
            
            console.log(inventory);
            for (const x in inventory) {
                labeL1[labeL1.length] = inventory[x].materialCode;
                data1[data1.length] = inventory[x].currentQtty;
                color[color.length] = generatePastelColor();
            }
      const ctx1 = document.getElementById('myChart1').getContext('2d');    
      const myChart = new Chart(ctx1, {
          type: 'bar',
          data: {
              labels: labeL1,
              datasets: [{
                  label: '# of Units to Produce',
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
    });
    </script>
</div>