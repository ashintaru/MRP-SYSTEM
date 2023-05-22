<div>
    @include('layouts.header')
    <div class="container my-12 mx-auto justify-around">
        <div class="flex flex-1 flex-col pb-10 md:flex-row lg:flex-row mx-2 p-1 rounded-lg justify-start space-x-3">
            <div class="w-full  rounded-lg bg-red-100">
                <div class="flex justify-between">
                    <div class="flex items-center justify-end">
                        @if(session('type')=='admin')
                            <h2 class="p-5 text-2xl font-[Varela Round] font-semibold text-red-500">Welcome Back Administrator!</h2>
                        @elseif(session('type')=='user')
                            <h2 class="p-5 text-2xl font-[Varela Round] font-semibold text-red-500">Welcome Back Staff!!</h2>
                        @endif
                    </div>
                    <div class="flex items-center justify-end p-5">
                    @if(session('type')=='admin')
                        <svg version="1.1" id="Capa_1" class="inline-block h-12 w-12 rounded-full" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 144.773 144.773" style="enable-background:new 0 0 144.773 144.773;" xml:space="preserve">
                        <g>
                            <circle style="fill:#FDC20E;" cx="72.387" cy="72.386" r="72.386"/>
                            <g>
                                <defs>
                                    <circle id="SVGID_1_" cx="72.387" cy="72.386" r="72.386"/>
                                </defs>
                                <clipPath id="SVGID_2_">
                                    <use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
                                </clipPath>
                                <g style="clip-path:url(#SVGID_2_);">
                                    <g>
                                        <path style="fill:#F1C9A5;" d="M107.053,116.94c-4.666-8.833-34.666-14.376-34.666-14.376s-30,5.543-34.666,14.376
                                            c-3.449,12.258-6.334,27.833-6.334,27.833h41h41C113.387,144.773,111.438,128.073,107.053,116.94z"/>
                                        <path style="fill:#E4B692;" d="M72.387,102.564c0,0,30,5.543,34.666,14.376c4.386,11.133,6.334,27.833,6.334,27.833h-41V102.564
                                            z"/>
                                        <rect x="64.22" y="84.606" style="fill:#F1C9A5;" width="16.334" height="27.336"/>
                                        <rect x="72.387" y="84.606" style="fill:#E4B692;" width="8.167" height="27.336"/>
                                        <path style="opacity:0.1;fill:#DDAC8C;" d="M64.22,97.273c1.469,4.217,7.397,6.634,11.751,6.634
                                            c1.575,0,3.107-0.264,4.583-0.747V84.606H64.22V97.273z"/>
                                        <path style="fill:#F1C9A5;" d="M93.387,67.357c0-17.074-9.402-26.783-21-26.783c-11.598,0-21,9.709-21,26.783
                                            c0,22.966,9.402,30.917,21,30.917C83.984,98.274,93.387,89.366,93.387,67.357z"/>
                                        <path style="fill:#E4B692;" d="M90.19,79.197c-3.807-0.399-6.377-4.5-5.732-9.156c0.637-4.66,4.242-8.12,8.051-7.724
                                            c3.805,0.396,6.371,4.496,5.729,9.156C97.599,76.134,93.997,79.591,90.19,79.197z"/>
                                        <path style="fill:#F1C9A5;" d="M46.685,71.474c-0.643-4.66,1.924-8.76,5.727-9.156c3.811-0.397,7.416,3.063,8.055,7.724
                                            c0.642,4.656-1.93,8.758-5.734,9.156C50.925,79.591,47.323,76.134,46.685,71.474z"/>
                                        <path style="fill:#E4B692;" d="M93.387,67.357c0-17.074-9.402-26.783-21-26.783v57.7C83.984,98.274,93.387,89.366,93.387,67.357
                                            z"/>
                                    </g>
                                    <path style="fill:#3595BB;" d="M107.053,116.94c-2.726-5.158-14.082-9.191-23.065-11.656l-11.601,13.26l-11.601-13.26
                                        c-8.983,2.465-20.34,6.498-23.065,11.656c-3.449,12.258-6.334,27.833-6.334,27.833h41h41
                                        C113.387,144.773,111.438,128.073,107.053,116.94z"/>
                                    <path style="fill:#262421;" d="M54.766,75.53c0,0,14.835-10.124,16.581-15.708c-0.175,5.061,0,9.599,0,9.599
                                        s14.487-14.311,13.09-26.005c-16.406-8.728-29.147,1.396-32.115,6.108C49.354,54.236,48.656,67.327,54.766,75.53z"/>
                                    <path style="fill:#262421;" d="M82.342,48.127c0,0,6.808,8.205,8.204,24.611c4.887-7.157,10.123-27.927-6.109-29.322
                                        C83.04,46.033,82.342,48.127,82.342,48.127z"/>
                                    <path style="fill:#FFFFFF;" d="M87.385,121.332l-9.077-8.437l-5.936,5.648l9.865-14.084c0,0,3.217,0.356,4.361,3.86
                                        C86.956,113.826,87.385,121.332,87.385,121.332z"/>
                                    <polygon style="fill:#27AAE1;" points="69.179,144.773 72.387,144.773 72.387,118.544 69.179,115.505 			"/>
                                    <path style="fill:#FFFFFF;" d="M57.359,121.332l9.077-8.437l5.936,5.648l-9.865-14.084c0,0-3.217,0.356-4.361,3.86
                                        C57.788,113.826,57.359,121.332,57.359,121.332z"/>
                                </g>
                            </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        </svg>
                        @elseif(session('type')=='user')
                        <div>
                           <svg version="1.1" id="Layer_1"  class="inline-block h-12 w-12 rounded-full"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931;" xml:space="preserve">
                           <circle style="fill:#337180;" cx="236.966" cy="236.966" r="236.966"/>
                           <g>
                              <path style="fill:#D69D61;" d="M292.591,284.022l0.015,0.03l18.308-0.812l27.955,43.73l4.969,42.312l-7.76,16.946l22.926,53.874
                                 c8.06-4.853,15.786-10.208,23.188-15.959l-37.882-142.527L292.591,284.022z"/>
                              <path style="fill:#D69D61;" d="M152.51,370.528l15.641-67.43l5.13-1.433l-36.243,6.327L94.247,426.13
                                 c9.253,6.993,19.031,13.332,29.276,18.933l29.137-74.244L152.51,370.528z"/>
                           </g>
                           <path style="fill:#D5C427;" d="M338.865,326.966l-27.955-43.73l-18.308,0.812l-20.58,0.909l-74.498,9.931l-24.247,6.773l-5.13,1.433
                              l-15.641,67.43l0.153,0.292l13.979,26.237l12.569,26.896l4.456,43.887c17.13,3.94,34.948,6.092,53.275,6.092
                              c26.544,0,52.04-4.43,75.864-12.479l7.57-40.95l15.689-34.278l7.76-16.946L338.865,326.966z"/>
                           <path style="fill:#B2723A;" d="M252.023,90.768c0,0-11.787,146.988,75.004,176.458c0,0-5.093-7.992-12.681-42.922
                              c0,0,7.397,19.057,26.739,17.53c0,0-27.221-39.266-28.647-68.613c0,0-0.49,14.14,27.412,19.255c0,0-28.553-42.731-31.345-75.539
                              C308.508,116.937,285.612,79.718,252.023,90.768z"/>
                           <path style="fill:#CE945F;" d="M243.173,208.573c16.056-0.299,29.874,11.308,30.877,25.934l4.165,61.226
                              c0.995,14.612-20.834,90.098-20.834,90.098s-36.306-74.416-37.302-89.039l-4.165-61.215
                              C214.912,220.958,227.117,208.865,243.173,208.573z"/>
                           <g>
                              <path style="fill:#9F6029;" d="M241.516,183.324c0,0-27.349,137.959-86.337,152.118c0,0,5.811-7.484,16.598-41.56
                                 c0,0-9.126,18.293-28.247,14.978c0,0,30.724-36.579,34.866-65.668c0,0-0.827,14.125-29.077,16.632c0,0,32.381-39.902,38.185-72.31
                                 C187.5,187.518,209.097,169.217,241.516,183.324z"/>
                              <path style="fill:#9F6029;" d="M245.265,204.087c0,0,16.939,139.616,74.704,158.157c0,0-5.231-7.895-13.433-42.682
                                 c0,0,7.73,18.918,27.042,17.051c0,0-27.902-38.783-29.855-68.1c0,0-0.236,14.151,27.749,18.769c0,0-29.298-42.215-32.662-74.97
                                 C298.809,212.307,278.649,192.446,245.265,204.087z"/>
                           </g>
                           <path style="fill:#D69D61;" d="M297.552,219.682c1.212,24.681-19.322,44.119-45.867,43.423l0,0
                              c-26.544-0.703-49.043-21.272-50.259-45.953l-5.066-103.374c-1.205-24.677,19.33-44.119,45.874-43.423l0,0
                              c26.537,0.703,49.036,21.272,50.252,45.949L297.552,219.682z"/>
                           <g>
                              <path style="fill:#BE7C3F;" d="M260.73,70.469c0,0-27.349,137.955-86.345,152.117c0,0,5.818-7.484,16.606-41.56
                                 c0,0-9.134,18.286-28.247,14.978c0,0,30.724-36.583,34.866-65.672c0,0-0.827,14.125-29.077,16.636c0,0,32.381-39.902,38.185-72.317
                                 C206.714,74.656,228.307,56.358,260.73,70.469z"/>
                              <path style="fill:#BE7C3F;" d="M251.768,89.387c0,0,26.031,40.86,52.048,49.204c0,0-13.01-1.848-10.245-35.289
                                 c0,0-0.007-27.872-27.872-37.144C265.699,66.162,247.113,66.169,251.768,89.387z"/>
                           </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                           <g></g><g></g><g></g>
                           </svg>
                        </div>
                    @endif
                    </div>
                </div>
            </div>    
            <div class="flex items-center">
                @if(session('type')=='admin') 
                    <button  id="dropdownToggleButton" data-tooltip-target="tooltip-default" data-tooltip-placement="bottom" data-dropdown-toggle="dropdownToggle" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-blue-700 rounded-lg  ">
                        <svg version="1.1" id="Layer_1" id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle" type="button" class="h-6 text-blue-700 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve">
<path style="fill:#25B7D3;" d="M496.158,248.085c0-137.022-111.069-248.082-248.075-248.082C111.07,0.003,0,111.063,0,248.085
	c0,137.001,111.07,248.07,248.083,248.07C385.089,496.155,496.158,385.086,496.158,248.085z"/>
<g>
	<path style="fill:#FFFFFF;" d="M315.249,359.555c-1.387-2.032-4.048-2.755-6.27-1.702c-24.582,11.637-52.482,23.94-57.958,25.015
		c-0.138-0.123-0.357-0.348-0.644-0.737c-0.742-1.005-1.103-2.318-1.103-4.015c0-13.905,10.495-56.205,31.192-125.719
		c17.451-58.406,19.469-70.499,19.469-74.514c0-6.198-2.373-11.435-6.865-15.146c-4.267-3.519-10.229-5.302-17.719-5.302
		c-12.459,0-26.899,4.73-44.146,14.461c-16.713,9.433-35.352,25.41-55.396,47.487c-1.569,1.729-1.733,4.314-0.395,6.228
		c1.34,1.915,3.825,2.644,5.986,1.764c7.037-2.872,42.402-17.359,47.557-20.597c4.221-2.646,7.875-3.989,10.861-3.989
		c0.107,0,0.199,0.004,0.276,0.01c0.036,0.198,0.07,0.5,0.07,0.933c0,3.047-0.627,6.654-1.856,10.703
		c-30.136,97.641-44.785,157.498-44.785,182.994c0,8.998,2.501,16.242,7.432,21.528c5.025,5.393,11.803,8.127,20.146,8.127
		c8.891,0,19.712-3.714,33.08-11.354c12.936-7.392,32.68-23.653,60.363-49.717C316.337,364.326,316.636,361.587,315.249,359.555z"/>
	<path style="fill:#FFFFFF;" d="M314.282,76.672c-4.925-5.041-11.227-7.597-18.729-7.597c-9.34,0-17.475,3.691-24.176,10.971
		c-6.594,7.16-9.938,15.946-9.938,26.113c0,8.033,2.463,14.69,7.32,19.785c4.922,5.172,11.139,7.794,18.476,7.794
		c8.958,0,17.049-3.898,24.047-11.586c6.876-7.553,10.363-16.433,10.363-26.393C321.646,88.105,319.169,81.684,314.282,76.672z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
<div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
    Delivered Orders
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
                        
                        @if($c!=null)
                        <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                            {{$c}}</div>
                        @endif
                    </button>
                @endif
            </div>
            <div class="flex items-center">
                <button  id="dropdownToggleButton" data-tooltip-target="tooltip-default1" data-tooltip-placement="bottom" data-dropdown-toggle="dropdownToggle1" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white ">
                    <svg version="1.1" id="Layer_1" class="h-6 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#FF877F;" d="M9.694,468.335L256,30.865l246.306,437.47H9.694z"/>
<g>
	<path style="fill:#573A32;" d="M243.2,140.8v204.8c0,7.074,5.726,12.8,12.8,12.8c7.074,0,12.8-5.726,12.8-12.8V140.8
		c0-7.074-5.726-12.8-12.8-12.8C248.926,128,243.2,133.726,243.2,140.8z"/>
	<path style="fill:#573A32;" d="M508.57,442.735L278.17,43.674c-4.574-7.919-13.022-12.8-22.17-12.8
		c-9.148,0-17.596,4.881-22.17,12.8L3.43,442.735c-4.574,7.919-4.574,17.681,0,25.6s13.022,12.8,22.17,12.8h460.8
		c9.148,0,17.596-4.881,22.17-12.8C513.143,460.416,513.143,450.654,508.57,442.735z M25.6,455.535L256,56.474l230.4,399.061H25.6z"
		/>
	<circle style="fill:#573A32;" cx="256" cy="409.6" r="25.6"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
<div id="tooltip-default1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
    Warning Stocks Level
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
                    
                    @if($wc!=null)                    
                    <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                        {{$wc}}</div>
                    @endif
                </button>
            </div>
            <div class="flex items-center">
                <button  id="dropdownToggleButton" data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" data-dropdown-toggle="dropdownToggle2" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white">
                    <svg class="h-6 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="m129.27 142.19-85.32-46.82a2.31 2.31 0 0 0 -3.43 2c-.41 18-2 93.55.09 96 3.31 3.88 85.08 51.16 88.67 51.16s84.53-48.76 88.67-51.16c3.66-2.11.86-78.2.15-96.08a2.32 2.32 0 0 0 -3.43-1.93z" fill="#191919"/><path d="m129.27 252.5c-2.47 0-4.81 0-48.44-25.2-42.92-24.79-45.39-27.68-46.32-28.77-2.38-2.8-3.28-3.85-2.89-47.45.19-21.47.69-44.87.9-53.93a10.31 10.31 0 0 1 15.28-8.8l81.48 44.71 81.54-44.74a10.32 10.32 0 0 1 15.27 8.68c.36 9.09 1.23 32.57 1.57 54.15.19 12.24.17 22 0 29.11-.38 12.16-1 17.37-5.66 20.07-.67.39-3.4 2-7.5 4.47-80.02 47.7-81.87 47.7-85.23 47.7zm-81.27-63.59c11.93 8.12 68.16 40.61 81.26 47 8-4 33.89-19.1 77-44.86l4.92-2.94c1-9.16.77-40.76-.71-81.3l-77.35 42.39a8 8 0 0 1 -7.7 0l-77.11-42.31c-.88 41.74-1.01 73-.31 82.02z" fill="#191919"/><path d="m40.6 91.49 88.67-47.29 88.67 47.29-88.67 48.65z" fill="#fff"/><path d="m130.52 41.08v95.94l-88.67-48.66z" fill="#e6e6e6"/><path d="m129.27 142.19-88.67-48.66s-2.38 97 0 99.81c3.31 3.88 85.08 51.16 88.67 51.16s84.53-48.76 88.67-51.16 0-99.81 0-99.81z" fill="#e83a2a"/><path d="m129.27 142.19c-1 2.06-2 102.81 0 102.31 6.35-1.56 85.32-46.93 89-51.75 1.58-2.09 2.39-97.93-.31-99.22s-87.66 46.6-88.69 48.66z" fill="#d32920"/><path d="m217.42 88c4.59-2.53 29.46-16.33 28.15-17.09s-87.67-45.94-89.85-46.6c-2-.61-24.48 14.1-28.13 16.5-3.76-2.61-30.82-21.24-33.9-19.52-3.31 1.8-83.39 46.48-86.26 48.14-2.64 1.57 26.79 16.36 31.34 18.64-4.25 2.15-29.69 14.59-28.12 15.49s83.82 49.44 88.22 49.92c2.83.31 25.8-14.24 28.82-16.24 3.38 2.24 31 20.48 33.76 18.92l87.13-50c1.61-.88-25.92-15.44-31.16-18.16zm-89.73 48.86-87.75-48.81 87.59-46.72 88.31 46.58z" fill="#191919"/><path d="m161.14 164.31c-4 0-9.47-2.68-20.47-9.33-4.79-2.9-9.64-6-13-8.2-2.87 1.8-6.64 4.14-10.33 6.33-13.41 7.89-16.34 8.65-19.34 8.33-2.56-.28-5.74-.62-89.37-49.78l-2-1.17a8.12 8.12 0 0 1 -4.06-7.29c.17-5.52 4.61-7.87 14.34-13 1.38-.73 2.82-1.48 4.25-2.21l-3.58-1.99c-14.26-7.76-18.15-10.64-18.31-16.06a8.3 8.3 0 0 1 4.17-7.44c2.2-1.27 46.78-26.15 83.79-46.8l2.57-1.43c5.16-2.88 11-.32 24.84 8.34 4.81 3 9.61 6.2 13.06 8.54 24.9-16.2 26.79-15.62 30.37-14.52 3.42 1 90.8 46.91 91.51 47.33a8.18 8.18 0 0 1 4.04 7.04c-.05 5.43-3.52 7.44-16.41 14.93l-3.21 1.86 4.77 2.63c14.33 8 17.72 10.07 17.82 15.51a8.13 8.13 0 0 1 -4.07 7.2l-79.15 45.38-8 4.58a8.31 8.31 0 0 1 -4.23 1.22zm-18.25-26.76c7.55 4.74 14 8.49 17.37 10.08l5.21-3 67.9-38.93c-4.31-2.43-9.94-5.51-16.7-9.1zm-116.71-34.15c44.25 25.93 66.18 38.21 72.94 41.54 2.91-1.42 8.15-4.46 13.18-7.51l-73.1-40.63c-5.51 2.75-9.76 4.91-13.02 6.6zm30.49-15.2 71 39.48 71.33-39.58-71.48-37.7zm-34.45-17.88c4.58 2.57 10.55 5.74 17 9l73.28-39.08a184 184 0 0 0 -17.58-10.52c-40.63 22.67-61.84 34.52-72.71 40.6zm120.7-29.91 73.68 38.86c5-2.78 9.58-5.39 13.34-7.59-20.94-11-63.28-33-74.59-38.71-2.62 1.41-7.08 4.03-12.43 7.44z" fill="#191919"/><path d="m218.42 88c .08-1.3 28.46-16.33 27.15-17.09s-87.67-45.94-89.85-46.6c-2-.61-27.54 16.43-28.13 16.5s-30.83-21.28-33.9-19.56c-3.31 1.84-83.39 46.52-86.26 48.18-2.64 1.57 31.27 17.8 31.34 18.64s-29.69 14.59-28.13 15.49 83.83 49.44 88.23 49.92c2.83.31 27.92-16.24 28.82-16.24s31 20.48 33.76 18.92l87.13-50c1.61-.88-30.24-16.89-30.16-18.16zm-90.73 48.86c-1-.08-87.72-48.14-87.74-48.78s87-46.63 87.59-46.72 88.32 45.33 88.31 46.58-87.15 48.97-88.16 48.89z" fill="#fff"/><path d="m72.15 187.68-.44-35.68c0-2.23 2.05-2.7 3.71-.82l25.44 28.82c1.59 1.81 1.62 4.47.06 4.89l-25 6.81c-1.63.49-3.74-1.79-3.77-4.02z" fill="#fff"/><path d="m128.67 142.67c-.67 17.17-1 77.67.61 101.83" fill="#d32920"/><path d="m129.27 248.5a4 4 0 0 1 -4-3.73c-1.64-24.68-1.27-85.22-.61-102.25a4 4 0 1 1 8 .31c-.64 16.44-1 77.43.6 101.41a4 4 0 0 1 -3.73 4.26z" fill="#191919"/></svg>
                    <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Empty Materials
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @if($n!=null)
                    <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                        {{$n}}</div>
                    @endif
                </button>
                
                <div id="dropdownToggle" class="hidden p-2 z-10 w-102 bg-white rounded divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="overflow-y-hidden h-28 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        @if($order!=null)
                                @foreach($order as $o)
                                    <li>
                                        <span href="#" class="no-underline text-sm font-semibold inline-flex items-center">
                                            <svg version="1.1" id="Layer_1" class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
<g>
	<circle style="fill:#CEE8FA;" cx="104.609" cy="361.276" r="47.518"/>
	<path style="fill:#CEE8FA;" d="M243.636,111.498v242.989h55.5c3.295-23.024,23.087-40.726,47.024-40.726
		c23.937,0,43.729,17.701,47.024,40.726h55.744V111.498H243.636z"/>
</g>
<path style="fill:#2D527C;" d="M498.032,238.485h-35.137v-21.417h21.16c7.713,0,13.968-6.255,13.968-13.968
	s-6.255-13.968-13.968-13.968h-21.16v-21.418h7.185c7.713,0,13.968-6.255,13.968-13.968c0-7.713-6.255-13.968-13.968-13.968h-7.185
	v-28.281c0-7.713-6.255-13.968-13.968-13.968H243.636c-7.714,0-13.968,6.255-13.968,13.968V340.52H195.61v-70.717
	c0-7.713-6.253-13.968-13.968-13.968c-7.714,0-13.968,6.255-13.968,13.968v70.717h-5.197c-8.533-23.717-31.249-40.726-57.868-40.726
	S55.275,316.802,46.74,340.52h-9.346c-5.216,0-9.459-4.243-9.459-9.459v-46.833c0-2.802,1.231-5.443,3.377-7.246
	c0.258-0.216,0.508-0.443,0.75-0.677l33.796-32.841h51.168c7.714,0,13.968-6.255,13.968-13.968s-6.253-13.968-13.968-13.968H78.722
	l25.391-66.924c8.647-19.038,27.691-31.359,48.511-31.427l15.049,0.071v56.634c0,7.713,6.253,13.968,13.968,13.968
	s13.968-6.255,13.968-13.968v-70.536c0-7.689-6.213-13.931-13.902-13.968l-29.063-0.137c-32.03,0.103-61.155,19.073-74.198,48.327
	c-0.108,0.242-0.208,0.486-0.302,0.733l-32.615,85.963l-32.613,31.691C4.7,263.07,0,273.342,0,284.228v46.833
	c0,20.621,16.775,37.395,37.395,37.395h6.164c3.569,30.528,29.578,54.303,61.049,54.303s57.48-23.775,61.049-54.303h119.452
	c3.569,30.528,29.578,54.303,61.049,54.303c7.713,0,13.968-6.255,13.968-13.968c0-7.713-6.255-13.968-13.968-13.968
	c-18.498,0-33.546-15.047-33.546-33.546c0-1.631,0.123-3.234,0.349-4.804l0.001-0.007c0.14-0.979,0.328-1.94,0.552-2.889
	c0.018-0.075,0.035-0.152,0.053-0.229c0.221-0.911,0.48-1.805,0.775-2.683c0.031-0.091,0.061-0.182,0.092-0.271
	c0.305-0.886,0.643-1.754,1.018-2.605c0.021-0.046,0.042-0.092,0.063-0.138c4.464-9.973,13.667-17.317,24.525-19.352
	c0.021-0.003,0.043-0.007,0.064-0.011c0.955-0.177,1.925-0.313,2.904-0.405c0.073-0.007,0.145-0.011,0.218-0.017
	c0.968-0.085,1.946-0.135,2.932-0.135s1.964,0.05,2.932,0.135c0.073,0.006,0.145,0.01,0.218,0.017
	c0.979,0.092,1.949,0.228,2.904,0.405c0.021,0.003,0.043,0.007,0.066,0.011c10.856,2.035,20.059,9.377,24.523,19.348
	c0.022,0.049,0.045,0.096,0.066,0.145c0.374,0.848,0.712,1.715,1.017,2.598c0.032,0.092,0.063,0.184,0.094,0.277
	c0.293,0.877,0.553,1.771,0.774,2.679c0.018,0.077,0.035,0.155,0.054,0.232c0.222,0.947,0.411,1.908,0.55,2.886
	c0,0.003,0.001,0.004,0.001,0.004c0.226,1.571,0.349,3.175,0.349,4.806c0,7.713,6.255,13.968,13.968,13.968
	c5.084,0,9.522-2.727,11.965-6.788h43.288c7.713,0,13.968-6.255,13.968-13.968v-88.067h35.137c7.713,0,13.968-6.255,13.968-13.968
	C511.999,244.737,505.747,238.485,498.032,238.485z M104.609,394.822c-18.498,0-33.546-15.047-33.546-33.546
	s15.049-33.548,33.546-33.548s33.546,15.049,33.546,33.548C138.155,379.775,123.106,394.822,104.609,394.822z M434.959,340.52
	h-30.932c-0.254-0.705-0.528-1.401-0.807-2.094c-0.022-0.056-0.043-0.113-0.067-0.169c-0.291-0.717-0.595-1.425-0.911-2.126
	c-0.001-0.003-0.003-0.007-0.006-0.011c-8.587-19.066-26.609-32.988-48.09-35.79c-0.352-0.046-0.703-0.094-1.056-0.134
	c-0.465-0.053-0.93-0.098-1.398-0.141c-0.546-0.05-1.096-0.089-1.647-0.126c-0.356-0.022-0.71-0.047-1.067-0.064
	c-0.936-0.043-1.876-0.071-2.822-0.071s-1.884,0.028-2.82,0.071c-0.358,0.017-0.711,0.042-1.067,0.064
	c-0.55,0.035-1.099,0.075-1.647,0.126c-0.468,0.042-0.933,0.088-1.398,0.141c-0.353,0.041-0.704,0.088-1.056,0.134
	c-21.475,2.801-39.494,16.718-48.084,35.778c-0.006,0.011-0.01,0.022-0.015,0.032c-0.314,0.697-0.616,1.4-0.905,2.111
	c-0.025,0.063-0.049,0.126-0.074,0.189c-0.277,0.689-0.549,1.379-0.802,2.08H257.61h-0.008V125.466h177.356v14.313h-30.485
	c-7.713,0-13.968,6.255-13.968,13.968s6.255,13.968,13.968,13.968h30.485v21.418h-16.509c-7.713,0-13.968,6.255-13.968,13.968
	c0,7.713,6.255,13.968,13.968,13.968h16.509v21.417h-2.532c-7.713,0-13.968,6.255-13.968,13.968s6.255,13.968,13.968,13.968h2.532
	v74.099H434.959z"/>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                                         The {{$o['materialCode']}} 
                                            were be delivered at 
                                            <span class="text-blue-900 bold ml-1 mr-1"> {{$o['orderDate']}} </span> 
                                            check it on 
                                            <a class="underline ml-1" href="{{ URL('orders', ['key1' => $o['orderListId'] ] )}}"> {{$o['orderListTitle']}} </a>
                                        </span>
                                    </li>    
                                @endforeach
                            @else
                                <li>
                                    <span href="#" class="no-underline  text-lg">
                                        <i class="fa fa-warning"></i> No Pending Orders to see in this week
                                    </span>
                                </li>
                            @endif
                    </ul>
                </div>

                <div id="dropdownToggle1" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        @if($warning!=null)
                                @foreach($warning as $o)
                                    <li>
                                        <span href="#" class="text-sm font-semibold inline-flex items-center">
                                            <svg version="1.1" id="Layer_1" class="h-6 w-6 mr-2 ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
<path style="fill:#FFFFFF;" d="M27.161,463.165h457.688L256.001,59.125L27.161,463.165z M255.345,417.901
	c-17.536,0-29.232-12.664-29.232-29.552c0-17.216,12.024-29.56,29.232-29.56c17.216,0,28.584,12.344,28.912,29.56
	C284.265,405.237,272.897,417.901,255.345,417.901z M273.865,342.541h-37.024l-7.48-147.144h51.648L273.865,342.541z"/>
<path style="fill:#8AD5DD;" d="M264.705,33.909c-1.768-3.136-5.096-5.072-8.704-5.072c-3.6,0-6.928,1.936-8.704,5.072l-246,434.328
	c-1.752,3.096-1.728,6.888,0.064,9.968c1.792,3.072,5.088,4.96,8.64,4.96h492c3.552,0,6.848-1.888,8.64-4.96
	c1.792-3.08,1.816-6.872,0.064-9.968L264.705,33.909z M27.161,463.165l228.84-404.04l228.84,404.04H27.161z"/>
<g>
	<polygon style="fill:#DB2B42;" points="236.841,342.541 273.865,342.541 281.009,195.397 229.361,195.397 	"/>
	<path style="fill:#DB2B42;" d="M255.345,358.781c-17.208,0-29.232,12.344-29.232,29.56c0,16.888,11.696,29.552,29.232,29.552
		c17.544,0,28.912-12.664,28.912-29.552C283.937,371.125,272.569,358.781,255.345,358.781z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                                         The {{$o['materialCode']}}
                                        <span class="no-underline text-sm mr-1 ml-1">
                                            Have been reach its stocklevel of <span class="text-blue-900 bold"> {{$o['threshold']}} </span> 
                                            check it on 
                                            <a class="text-blue-700 hover:underline" href="{{ URL('inventory')}}"> Inventory </a>
                                        </span>
                                    </li>    
                                @endforeach
                            @else
                                <li>
                                    <span href="#" class="no-underline  text-lg">
                                        <i class="fa fa-warning"></i> All materials are not empty
                                    </span>
                                </li>
                            @endif
                    </ul>
                </div>
                <div id="dropdownToggle2" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        @if($null!=null)
                                @foreach($null as $o)
                                    <li>
                                        <span href="#" class="no-underline  text-2xl">
                                            <i class="fa fa-warning"></i> The {{$o['materialCode']}}
                                        </span>
                                        <span class="no-underline text-lg">
                                            Have been <span class="text-blue-900 bold"> {{$o['currentQtty']}} Lately</span> 
                                            check it on <a class="underline" href="{{ URL('inventory')}}"> Inventory </a>
                                        </span>
                                    </li>    
                                @endforeach
                            @else
                                <li>
                                    <span href="#" class="no-underline  text-lg">
                                        <i class="fa fa-warning"></i> All materials are not empty
                                    </span>
                                </li>
                            @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex rounded-3xl shadow-2xl bg-white py-10 flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class=" mb-2 p-2 md:w-1/2 mx-2">
            <canvas id="myChart1"></canvas>
            </div>
            <div class=" mb-2 p-2 md:w-1/2 mx-2">
            <canvas id="myChart2"></canvas>
            </div>
        </div>

<div class="flex flex-1 flex-col  md:flex-row lg:flex-row mx-2 py-10" >
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">      
          <div class=" mb-2 p-2 w-full mx-2">
            <div class="  bg-white rounded-xl shadow-lg ">
                <p class="text-left text-xl text-black p-2 font-bold mb-2 bg-red-100 rounded-lg"> Pending Production </p>
                <div class="flex justify-around">
                    <div>Model Name</div>
                    <div> # of Units</div>
                    <div> List</div>
                </div>
                <div class="flex flex-col h-64 overflow-auto">
                    @if($pp!=null)
                        @foreach($pp as $l)
                            <div class="flex items-center justify-around p-7">
                                <div class="flex items-center">{{$l->modelName}}</div>
                                <div class="flex items-center">{{$l->productQtty}}</div>
                                <a  href="{{ URL('product', ['key1' => $l->listId] )}}" data-tooltip-target="tooltip-bottom3" data-tooltip-placement="bottom" class="flex items-center justify-center">
                                    GOTO
                                     <div id="tooltip-bottom3" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                         Go to
                                         <div class="tooltip-arrow" data-popper-arrow></div>
                                     </div>
                                 </a>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
          </div>  
        
    </div>
</div>

{{-- 
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

            <div class="container my-12 mx-auto px-4 md:px-6">
                <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                    <div class="flex flex-row-reverse md:w-1/1 mx-1">

                        <div class="flex border-2 border-black min-w-full space-x-10">
                            <div class="flex border-solid  justify-between  px-3">
                                <div>
                                    <button  id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Info Order
                                        <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                                            {{$c}}</div>
                                    </button>
                                </div>
                                <div>
                                    <button  id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle1" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Info Order
                                        <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                                            {{$wc}}</div>
                                    </button>
                                </div>
                                <div>
                                    <button  id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle2" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Info Order
                                        <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                                            {{$n}}</div>
                                    </button>
                                </div>
                            </div>
                            

                            <div id="dropdownToggle" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    @if($order!=null)
                                            @foreach($order as $o)
                                                <li>
                                                    <span href="#" class="no-underline  text-2xl">
                                                        <i class="fa fa-warning"></i> The {{$o['materialCode']}}
                                                    </span>
                                                    <span class="no-underline text-lg">
                                                        were be delivered at <span class="text-blue-900 bold"> {{$o['orderDate']}} </span> 
                                                        check it on <a class="underline" href="{{ URL('list', ['key1' => $o['orderListId'] ] )}}"> {{$o['orderListTitle']}} </a>
                                                    </span>
                                                </li>    
                                            @endforeach
                                        @else
                                            <li>
                                                <span href="#" class="no-underline  text-lg">
                                                    <i class="fa fa-warning"></i> No Pending Orders to see in this week
                                                </span>
                                            </li>
                                        @endif
                                </ul>
                            </div>

                            <div id="dropdownToggle1" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    @if($warning!=null)
                                            @foreach($warning as $o)
                                                <li>
                                                    <span href="#" class="no-underline  text-2xl">
                                                        <i class="fa fa-warning"></i> The {{$o['materialCode']}}
                                                    </span>
                                                    <span class="no-underline text-lg">
                                                        Have been <span class="text-blue-900 bold"> {{$o['currentQtty']}} Lately</span> 
                                                        check it on <a class="underline" href="{{ URL('inventory')}}"> Inventory </a>
                                                    </span>
                                                </li>    
                                            @endforeach
                                        @else
                                            <li>
                                                <span href="#" class="no-underline  text-lg">
                                                    <i class="fa fa-warning"></i> All materials are not empty
                                                </span>
                                            </li>
                                        @endif
                                </ul>
                            </div>
                            <div id="dropdownToggle2" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    @if($null!=null)
                                            @foreach($null as $o)
                                                <li>
                                                    <span href="#" class="no-underline  text-2xl">
                                                        <i class="fa fa-warning"></i> The {{$o['materialCode']}}
                                                    </span>
                                                    <span class="no-underline text-lg">
                                                        Have been <span class="text-blue-900 bold"> {{$o['currentQtty']}} Lately</span> 
                                                        check it on <a class="underline" href="{{ URL('inventory')}}"> Inventory </a>
                                                    </span>
                                                </li>    
                                            @endforeach
                                        @else
                                            <li>
                                                <span href="#" class="no-underline  text-lg">
                                                    <i class="fa fa-warning"></i> All materials are not empty
                                                </span>
                                            </li>
                                        @endif
                                </ul>
                            </div>
                        </div>
                    </div>
              </div>

                <div class="container my-12 mx-auto px-2 md:px-2">
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class=" mb-2 p-2 md:w-1/2 mx-2">
                          <canvas id="myChart1"></canvas>
                        </div>
                        <div class=" mb-2 p-2 md:w-1/2 mx-2">
                          <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">      
                              <div class=" mb-2 p-2 md:w-1/4 mx-2">
                                  <table class="min-w-full">
                                      <div class="place-items-center">
                                          <span> Empty Materials</span>
                                      </div>
                                      <thead class="border-b">
                                          <tr>
                                              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                                                  Material name
                                              </th>
                                              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                                                  Material Quantity
                                              </th>
                                          </tr>                                    
                                      </thead>
                                      <tbody>
                                          @if($null!=null)
                                              @foreach($null as $l)
                                                  <tr>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$l['materialCode']}}</td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$l['currentQtty']}}</td>
                                                  </tr>
                                              @endforeach
                                          @endif
                                      </tbody>
                                  </table>
                              </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div> --}}
    <script>
        $(document).ready(function () {
        const inventory = {!! json_encode($least , JSON_HEX_TAG) !!};
        const labeL1 = [];
        const data1 = [];
    
          for (const x in inventory) {
            labeL1[labeL1.length] = inventory[x].materialCode;
            data1[data1.length] = inventory[x].currentQtty;      
            }
    
            const ctx1 = document.getElementById('myChart1').getContext('2d');
            const myChart = new Chart(ctx1, {
              type: 'line',
              data: {
                  labels: labeL1,
                  datasets: [{
                      label: 'Least 5 Materials',
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
    
        const inventory1 = {!! json_encode($high , JSON_HEX_TAG) !!};
        const labeL2 = [];
        const data2 = [];
        
    
          for (const x in inventory1) {
            labeL2[labeL2.length] = inventory1[x].materialCode;
            data2[data2.length] = inventory1[x].currentQtty;      
            }
    
            const ctx2 = document.getElementById('myChart2').getContext('2d');
            const myChart2 = new Chart(ctx2, {
              type: 'line',
              data: {
                  labels: labeL2,
                  datasets: [{
                      label: 'Top 5 Materials',
                      data: data2,
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
{{-- <div class="flex flex-1 flex-col  md:flex-row lg:flex-row mx-2 py-10" >
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">      
          <div class=" mb-2 p-2 md:w-2/4  mx-2 overflow-auto bg-white rounded-xl shadow-lg  ">
                <p class="text-left text-xl text-black p-2 font-bold mb-2 bg-red-100 rounded-lg"> Empty Materials </p>
              <table class="min-w-full ">
                  <thead class="border-b">
                      <tr>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-center">
                              Material Name
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-center">
                              Material Quantity
                          </th>
                      </tr>                                    
                  </thead>
                  <tbody>
                      @if($null!=null)
                          @foreach($null as $l)
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{$l['materialCode']}}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{$l['currentQtty']}}</td>
                              </tr>
                          @endforeach
                      @endif
                  </tbody>
              </table>
          </div>
          <div class=" mb-2 p-2 md:w-2/4 mx-2">
            <div class="  bg-white rounded-xl shadow-lg ">
                <p class="text-left text-xl text-black p-2 font-bold mb-2 bg-red-100 rounded-lg"> Pending Production </p>
                <div class="flex justify-around">
                    <div>Model Name</div>
                    <div> # of Units</div>
                    <div> List</div>
                </div>
                <div class="flex flex-col h-64 overflow-auto">
                    @if($pp!=null)
                        @foreach($pp as $l)
                            <div class="flex items-center justify-around p-7">
                                <div class="flex items-center">{{$l->modelName}}</div>
                                <div class="flex items-center">{{$l->productQtty}}</div>
                                <a  href="{{ URL('product', ['key1' => $l->listId] )}}" data-tooltip-target="tooltip-bottom3" data-tooltip-placement="bottom" class="flex items-center justify-center">
                                    GOTO
                                     <div id="tooltip-bottom3" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                         Go to
                                         <div class="tooltip-arrow" data-popper-arrow></div>
                                     </div>
                                 </a>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
          </div>  
        
    </div>
</div> --}}
