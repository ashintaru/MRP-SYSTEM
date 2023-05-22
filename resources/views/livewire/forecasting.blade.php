<div>
    <div class="container my-6 mx-auto px-4 md:px-6">   
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Production Management
                    </a>
                </li>
                <li class="inline-flex items-center">
                  <a href="{{URL('production')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  Production List
                  </a>
              </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Forecast</span>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{$model->modelName}}</span>
                    </div>
                </li>
                </ol>
        </nav>
        <div class="flex justify-center">
            <div class=" mb-2 p-2 md:w-1/2 mx-2 bg-white rounded-lg">
                <div class="flex items-center justify-center">
                    <span>Model</span>
                </div>
                <table class="min-w-full bg-white shadow-sm">
                    <thead class="bg-gray-400">
                        <tr>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left" >Model name</th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Z score</th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Time frame</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$model->modelName}}</td>
                            <td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$zscore}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{$timeframe}} / month</td>                                    
                        </tr>
                    </tbody>
                </table>
                <div class="flex items-center justify-center">
                    <span>Materials</span>
                </div>
                <table class="min-w-full bg-white shadow-sm">
                    <thead class="bg-gray-400">
                        <tr>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left" >Material name</th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Vendor ame</th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Vendor LeadTime</th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Stock Level</th>    
                        </tr>
                    <tbody>
                        @if($mt!=null)
                            @foreach($mt as $m)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$m['materialCode']}}</td>
                                    <td  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$m['vendorName']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{$m['vendorLeadTime']}} / month</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{$m['threshold']}} / unit</td>
                                    
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="mb-2 p-2 md:w-1/2 mx-2 bg-white rounded-lg">
                <div class="flex items-center justify-center">
                    <span> Past Data of {{$model->modelName}} from {{$timeframe}} months Time Frame </span>
                </div>
                <canvas class="h-2" id="myChart1"></canvas>
            </div>
                
        </div>
        <div class="overflow-x-auto pt-3">
            <table class="min-w-full">
                <thead class="bg-gray-400">
                    <tr>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Material name</th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">ROP</th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Safety Stock</th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Standard Deviation</th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Demand During Lead Time</th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">Lead Time / days</th>

                    </tr>
                <tbody>
                   
                        @if($data!=null)
                            @for($i=0 ;$i <= $index-1; $i++)
                                <tr>
                                    @for($x=0 ;$x <= $count-1; $x++)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$data[$i][$x]}}</td>
                                    @endfor
                                </tr>
                            @endfor
                        @else
                            <tr>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                                <td class="">No Records</td>
                            </tr>
                        @endif

    
                    {{-- @foreach ($data as $item)
                            <td>{{$item[0] }}</td>
                    @endforeach --}}

                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
        
            const production = {!! json_encode($pr , JSON_HEX_TAG) !!};
            // productQtty
            // productionLeadTime
            const labeL1 = [];
              const data1 = [];
        //   console.log(inventory);
            for (const x in production) {
                labeL1[labeL1.length] = production[x].productionLeadTime;
                data1[data1.length] = production[x].productQtty;
            }

            const ctx1 = document.getElementById('myChart1').getContext('2d');

            const myChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labeL1,
                datasets: [{
                    label: '# of Units',
                    data: data1,
                    backgroundColor: [
                        'skyblue',
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
