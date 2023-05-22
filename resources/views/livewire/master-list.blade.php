<div>
    <section>
        @include('layouts.header')
        @include('livewire.bom-add-new-form')
        {{-- @include('livewire.bom-edit-form')  --}}
        @include('livewire.masterlist-view-form') 
    </section>
    <section>
        <div class="container my-6 mx-auto px-4 md:px-6">
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Master List Management
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Master List</span>
                    </div>
                </li>
                </ol>
            </nav>
        <div class="container my-3 mx-auto px-1 md:px-12 ">
            <div class="flex flex-wrap -mx-1/2 lg:-mx-1/3 ">
                <div class="">
                    <button id="add" class="text-md flex items-center bg-blue-700 py-2 rounded-md pl-3 text-white font-semibold hover:bg-blue-800"  data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal" wire:click.prevent="clear" >
                        Create Master List 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-1 font-bold mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                          </svg>
                    </button>                              
                    <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Create Master List
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>  
                </div>            
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto px-4 md:px-12 ">
            <div class="flex flex-wrap -mx-1/2 lg:-mx-1/3 ">
                @if($masterList != null)
                @foreach($masterList as $list)
                <div class="  my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                    <div class="transition ease-in-out delay-150  hover:-translate-y-1  hover:scale-110 w-full max-w-sm bg-white rounded-lg border shadow-2xl border-gray-200  dark:bg-gray-800 dark:border-gray-700">
                        
                        <div class="flex justify-end px-4 pt-4">
                            @if($show==1 && $list['listId'] == $ids)
                                <button id="dropdownButton" wire:click.prevent="cancel" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-red-500 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            @endif
                        </div>
                        <div class="flex flex-col items-center pb-10">                    
                            <svg version="1.1" class="mb-3 w-24 h-24 rounded-full shadow-lg" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g transform="translate(1 1)">
	<path style="fill:#FFE100;" d="M322.567,74.541c0,36.931-30.216,67.148-67.148,67.148s-67.148-30.216-67.148-67.148
		S218.489,7.393,255.42,7.393S322.567,37.61,322.567,74.541"/>
	<path style="fill:#FFA800;" d="M263.813,7.393c-4.197,0-8.393,0.839-12.59,0.839c31.056,5.875,54.557,33.574,54.557,66.308
		s-23.502,60.433-54.557,66.308c4.197,0.839,8.393,0.839,12.59,0.839c36.931,0,67.148-30.216,67.148-67.148
		S300.744,7.393,263.813,7.393"/>
	<path style="fill:#FFFFFF;" d="M247.026,7.393c4.197,0,8.393,0.839,12.59,0.839c-31.056,5.875-54.557,33.574-54.557,66.308
		s23.502,60.433,54.557,66.308c-4.197,0-8.393,0.839-12.59,0.839c-36.931,0-67.148-30.216-67.148-67.148
		S210.095,7.393,247.026,7.393"/>
	<g>
		<polygon style="fill:#FDCC00;" points="272.207,208.836 238.633,208.836 221.846,175.262 288.993,175.262 		"/>
		<path style="fill:#FDCC00;" d="M255.42,141.689c-12.59,0-23.502-3.357-33.574-9.233v42.807h67.148v-42.807
			C278.921,138.331,268.01,141.689,255.42,141.689"/>
	</g>
	<g>
		<path style="fill:#FFE100;" d="M121.125,309.557c-5.036,0-8.393-3.357-8.393-8.393v-41.967c0-5.036,3.357-8.393,8.393-8.393
			c5.036,0,8.393,3.357,8.393,8.393v41.967C129.518,306.2,126.161,309.557,121.125,309.557z"/>
		<path style="fill:#FFE100;" d="M406.502,309.557c-5.036,0-8.393-3.357-8.393-8.393v-41.967c0-5.036,3.357-8.393,8.393-8.393
			c5.036,0,8.393,3.357,8.393,8.393v41.967C414.895,306.2,411.538,309.557,406.502,309.557z"/>
		<path style="fill:#FFE100;" d="M406.502,267.59H121.125c-5.036,0-8.393-3.357-8.393-8.393s3.357-8.393,8.393-8.393h285.377
			c5.036,0,8.393,3.357,8.393,8.393S411.538,267.59,406.502,267.59z"/>
		<path style="fill:#FFE100;" d="M263.813,267.59c-5.036,0-8.393-3.357-8.393-8.393v-41.967c0-5.036,3.357-8.393,8.393-8.393
			s8.393,3.357,8.393,8.393v41.967C272.207,264.233,268.849,267.59,263.813,267.59z"/>
		<path style="fill:#FFE100;" d="M112.731,443.852c-14.269,0-25.18-10.911-25.18-25.18s10.911-25.18,25.18-25.18
			s25.18,10.911,25.18,25.18S127,443.852,112.731,443.852L112.731,443.852z M186.593,408.6
			c-15.108-2.518-21.823-20.144-12.59-32.734l6.715-8.393l-13.43-13.429l-8.393,5.875c-12.59,8.393-30.216,0.839-31.895-14.269
			l-3.357-10.911h-19.305l-2.518,13.43c-2.518,14.269-19.305,21.823-31.895,13.43l-10.911-7.554l-13.43,13.43l6.715,8.393
			c9.233,12.59,2.518,30.216-12.59,32.734l-10.911,1.679v19.305l10.911,1.679c15.108,2.518,22.662,19.305,14.269,31.895
			l-5.875,8.393l13.43,14.269l8.393-6.715c12.59-9.233,30.216-2.518,32.734,12.59l1.679,10.911h19.305l0.839-7.554
			c2.518-15.108,20.144-22.662,32.734-13.43l5.875,4.197l13.43-13.43l-5.875-8.393c-8.393-12.59-0.839-30.216,14.269-31.895
			l10.911-1.679v-20.144L186.593,408.6z"/>
		<path style="fill:#FFE100;" d="M398.108,443.852c-14.269,0-25.18-10.911-25.18-25.18s10.911-25.18,25.18-25.18
			s25.18,10.911,25.18,25.18S412.377,443.852,398.108,443.852L398.108,443.852z M471.97,408.6
			c-15.108-2.518-21.823-20.144-12.59-32.734l6.715-8.393l-13.43-13.429l-8.393,5.875c-12.59,8.393-30.216,0.839-31.895-14.269
			l-3.357-10.911h-19.305l-2.518,13.43c-2.518,14.269-19.305,21.823-31.895,13.43l-10.911-7.554l-13.43,13.43l6.715,8.393
			c9.233,12.59,2.518,30.216-12.59,32.734l-10.911,1.679v19.305l10.911,1.679c15.108,2.518,22.662,19.305,14.269,31.895
			l-5.875,8.393l13.43,13.43l8.393-6.715c12.59-9.233,30.216-2.518,32.734,12.59l1.679,11.751h19.305l0.839-7.554
			c2.518-15.108,20.144-22.662,32.734-13.43l5.875,4.197l13.43-13.43l-5.875-8.393c-8.393-12.59-0.839-30.216,14.269-31.895
			l10.911-1.679v-20.144L471.97,408.6z"/>
	</g>
	<path d="M255.42,150.082c-41.967,0-75.541-33.574-75.541-75.541S213.452-1,255.42-1s75.541,33.574,75.541,75.541
		S297.387,150.082,255.42,150.082z M255.42,15.787c-32.734,0-58.754,26.02-58.754,58.754s26.02,58.754,58.754,58.754
		s58.754-26.02,58.754-58.754S288.154,15.787,255.42,15.787z"/>
	<path d="M272.207,217.229h-33.574c-3.357,0-5.875-1.679-7.554-5.036l-16.787-33.574c-1.679-2.518-0.839-5.875,0-8.393
		c1.679-2.518,4.197-4.197,7.554-4.197h67.148c2.518,0,5.875,1.679,7.554,4.197c1.679,2.518,1.679,5.875,0,8.393l-16.787,33.574
		C278.082,215.551,275.564,217.229,272.207,217.229z M243.669,200.443h23.502l8.393-16.787h-40.289L243.669,200.443z"/>
	<path d="M255.42,150.082c-5.036,0-8.393-3.357-8.393-8.393V40.967c0-5.036,3.357-8.393,8.393-8.393
		c5.036,0,8.393,3.357,8.393,8.393v100.721C263.813,146.725,260.456,150.082,255.42,150.082z"/>
	<path d="M272.207,74.541h-33.574c-5.036,0-8.393-3.357-8.393-8.393s3.357-8.393,8.393-8.393h33.574
		c5.036,0,8.393,3.357,8.393,8.393S277.243,74.541,272.207,74.541z"/>
	<path d="M272.207,108.115h-33.574c-5.036,0-8.393-3.357-8.393-8.393s3.357-8.393,8.393-8.393h33.574
		c5.036,0,8.393,3.357,8.393,8.393S277.243,108.115,272.207,108.115z"/>
	<path d="M112.731,301.164c-5.036,0-8.393-3.357-8.393-8.393v-41.967c0-5.036,3.357-8.393,8.393-8.393
		c5.036,0,8.393,3.357,8.393,8.393v41.967C121.125,297.807,117.767,301.164,112.731,301.164z"/>
	<path d="M398.108,301.164c-5.036,0-8.393-3.357-8.393-8.393v-41.967c0-5.036,3.357-8.393,8.393-8.393s8.393,3.357,8.393,8.393
		v41.967C406.502,297.807,403.144,301.164,398.108,301.164z"/>
	<path d="M398.108,259.197H112.731c-5.036,0-8.393-3.357-8.393-8.393s3.357-8.393,8.393-8.393h285.377
		c5.036,0,8.393,3.357,8.393,8.393S403.144,259.197,398.108,259.197z"/>
	<path d="M255.42,259.197c-5.036,0-8.393-3.357-8.393-8.393v-41.967c0-5.036,3.357-8.393,8.393-8.393
		c5.036,0,8.393,3.357,8.393,8.393v41.967C263.813,255.839,260.456,259.197,255.42,259.197z"/>
	<path d="M288.993,183.656h-67.148c-5.036,0-8.393-3.357-8.393-8.393v-42.807c0-3.357,1.679-5.875,4.197-7.554
		c2.518-1.679,5.875-1.679,8.393,0c17.626,10.072,41.128,10.072,58.754,0c2.518-1.679,5.875-1.679,8.393,0s4.197,4.197,4.197,7.554
		v42.807C297.387,180.298,294.03,183.656,288.993,183.656z M230.239,166.869H280.6v-20.984c-15.948,5.875-34.413,5.875-50.361,0
		V166.869z"/>
	<path d="M123.643,511h-19.305c-4.197,0-7.554-2.518-8.393-6.715l-1.679-10.072c-1.679-6.715-6.715-10.072-12.59-10.072
		c-2.518,0-5.036,0.839-7.554,2.518l-8.393,6.715c-3.357,2.518-8.393,1.679-10.911-0.839l-13.43-13.43
		c-2.518-2.518-3.357-7.554-0.839-10.911l5.875-8.393c2.518-3.357,2.518-7.554,0.839-11.751c-1.679-4.197-5.036-6.715-9.233-7.554
		l-10.911-1.679c-4.197-0.839-6.715-4.197-6.715-8.393v-20.144c0-4.197,2.518-7.554,6.715-8.393l10.072-1.679
		c4.197-0.839,7.554-3.357,9.233-7.554c1.679-4.197,0.839-8.393-1.679-11.751l-6.715-8.393c-2.518-3.357-1.679-7.554,0.839-10.911
		l13.43-13.43c2.518-2.518,7.554-3.357,10.911-0.839l10.911,7.554c2.518,1.679,4.197,2.518,6.715,2.518
		c5.036,0,10.911-3.357,12.59-10.072l2.518-13.43c0.839-5.036,5.036-7.554,8.393-7.554h19.305c4.197,0,7.554,3.357,8.393,6.715
		l1.679,10.911c0.839,6.715,6.715,10.911,12.59,10.911c2.518,0,5.036-0.839,6.715-2.518l8.393-5.875
		c3.357-2.518,7.554-1.679,10.911,0.839l13.43,13.43c2.518,2.518,3.357,7.554,0.839,10.911l-6.715,8.393
		c-2.518,3.357-3.357,7.554-1.679,11.751c1.679,4.197,5.036,6.715,9.233,7.554l10.072,1.679c4.197,0.839,6.715,4.197,6.715,8.393
		v19.305c0,4.197-3.357,7.554-6.715,8.393l-10.911,1.679c-4.197,0.839-7.554,3.357-9.233,7.554
		c-1.679,4.197-1.679,8.393,0.839,11.751l5.875,8.393c2.518,3.357,1.679,7.554-0.839,10.911l-13.43,13.429
		c-2.518,2.518-7.554,3.357-10.911,0.839l-5.875-4.197c-2.518-1.679-5.036-2.518-7.554-2.518c-5.036,0-10.911,3.357-12.59,10.911
		l-0.839,7.554C132.036,507.643,127.839,511,123.643,511z M111.892,494.213h5.036c2.518-14.269,14.269-25.18,28.538-25.18
		c5.875,0,11.751,1.679,16.787,5.875l0,0l3.357-3.357l-1.679-2.518c-5.875-8.393-6.715-18.466-2.518-27.698
		c4.197-9.233,12.59-15.948,22.662-16.787l3.357-0.839v-5.036l-3.357-0.839c-10.072-1.679-17.626-8.393-21.823-17.626
		c-4.197-9.233-2.518-20.144,3.357-27.698l1.679-2.518l-3.357-3.357l-2.518,1.679c-5.036,3.357-10.911,5.036-15.948,5.036
		c-14.269,0-26.859-10.072-28.538-25.18l0-5.036h-5.036l-0.839,5.875c-2.518,13.43-15.108,23.502-28.538,23.502
		c-5.875,0-11.751-1.679-15.948-5.036l-5.036-3.357l-5.036,4.197l1.679,2.518c5.875,8.393,7.554,18.466,3.357,27.698
		c-4.197,9.233-11.751,15.948-21.823,17.626l-2.518,1.679v5.036l3.357,0.839c10.072,1.679,18.466,7.554,22.662,16.787
		c4.197,9.233,3.357,19.305-2.518,27.698l-1.679,2.518l3.357,4.197l2.518-1.679c5.036-3.357,10.911-5.875,16.787-5.875
		c14.269,0,26.02,10.072,28.538,23.502L111.892,494.213z M112.731,452.246c-18.466,0-33.574-15.108-33.574-33.574
		s15.108-33.574,33.574-33.574s33.574,15.108,33.574,33.574S131.197,452.246,112.731,452.246z M112.731,401.885
		c-9.233,0-16.787,7.554-16.787,16.787c0,9.233,7.554,16.787,16.787,16.787s16.787-7.554,16.787-16.787
		C129.518,409.439,121.964,401.885,112.731,401.885z"/>
	<path d="M409.02,511h-19.305c-4.197,0-7.554-2.518-8.393-6.715l-1.679-10.072c-1.679-6.715-6.715-10.072-12.59-10.072
		c-2.518,0-5.036,0.839-7.554,2.518l-8.393,6.715c-3.357,2.518-8.393,1.679-10.911-0.839l-13.43-13.43
		c-2.518-2.518-3.357-7.554-0.839-10.911l5.875-8.393c2.518-3.357,2.518-7.554,0.839-11.751s-5.036-6.715-9.233-7.554l-10.911-1.679
		c-4.197-0.839-6.715-4.197-6.715-8.393v-20.144c0-4.197,2.518-7.554,6.715-8.393l10.072-1.679c4.197-0.839,7.554-3.357,9.233-7.554
		c1.679-4.197,0.839-8.393-1.679-11.751l-6.715-8.393c-2.518-3.357-1.679-8.393,0.839-10.911l13.429-13.43
		c2.518-2.518,7.554-3.357,10.911-0.839l10.911,7.554c2.518,1.679,4.197,2.518,6.715,2.518c5.036,0,10.911-3.357,12.59-10.072
		l2.518-13.43c0.839-4.197,4.197-6.715,8.393-6.715h19.305c4.197,0,7.554,3.357,8.393,6.715l1.679,10.911
		c0.839,6.715,6.715,10.911,12.59,10.911c2.518,0,5.036-0.839,6.715-2.518l8.393-5.875c3.357-2.518,7.554-1.679,10.911,0.839
		l13.43,13.43c2.518,2.518,3.357,7.554,0.839,10.911l-6.715,8.393c-2.518,3.357-3.357,7.554-1.679,11.751
		c1.679,4.197,5.036,6.715,9.233,7.554l10.072,1.679c4.197,0.839,6.715,4.197,6.715,8.393v19.305c0,4.197-3.357,7.554-6.715,8.393
		l-10.911,1.679c-4.197,0.839-7.554,3.357-9.233,7.554c-1.679,4.197-1.679,8.393,0.839,11.751l5.875,8.393
		c2.518,3.357,1.679,7.554-0.839,10.911l-13.429,13.43c-2.518,2.518-7.554,3.357-10.911,0.839l-5.875-4.197
		c-2.518-1.679-5.036-2.518-7.554-2.518c-5.036,0-10.911,3.357-12.59,10.911l-0.839,7.554C417.413,507.643,413.216,511,409.02,511z
		 M397.269,494.213h5.036c2.518-14.269,14.269-24.341,28.538-24.341c5.875,0,11.751,1.679,16.787,5.875l0,0l3.357-3.357
		l-1.679-2.518c-5.875-8.393-6.715-18.466-2.518-27.698c4.197-9.233,12.59-15.948,22.662-16.787l3.357-0.839v-5.036l-3.357-0.839
		c-10.072-1.679-17.626-8.393-21.823-17.626c-3.357-9.233-2.518-20.144,3.357-27.698l1.679-2.518l-3.357-3.357l-2.518,1.679
		c-5.036,3.357-10.911,5.036-15.948,5.036c-14.269,0-26.859-10.072-28.538-24.341l0-6.715h-5.036l-0.839,5.875
		c-2.518,13.43-15.108,23.502-28.538,23.502c-5.875,0-11.751-1.679-15.948-5.036l-5.036-3.357l-5.036,4.197l1.679,2.518
		c5.875,8.393,7.554,18.466,3.357,27.698c-3.357,9.233-11.751,15.948-21.823,17.626l-2.518,1.679v5.036l3.357,0.839
		c10.072,1.679,18.466,7.554,22.662,16.787c4.197,9.233,3.357,19.305-2.518,27.698l-1.679,2.518l3.357,3.357l2.518-1.679
		c5.036-3.357,10.911-5.875,16.787-5.875c14.269,0,26.02,10.072,28.538,23.502L397.269,494.213z M398.108,452.246
		c-18.466,0-33.574-15.108-33.574-33.574s15.108-33.574,33.574-33.574s33.574,15.108,33.574,33.574S416.574,452.246,398.108,452.246
		z M398.108,401.885c-9.233,0-16.787,7.554-16.787,16.787c0,9.233,7.554,16.787,16.787,16.787s16.787-7.554,16.787-16.787
		C414.895,409.439,407.341,401.885,398.108,401.885z"/>
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
                            <div>
                                @if($show==1 && $list['listId'] == $ids)
                                    <select id='model' wire:model='selectModel' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                                focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none"  aria-label="Default select example" name="type">
                                    @if($models==null)
                                        <option value="">--Select Option--</option>
                                    @else
                                        <option value="">Select Option</option>
                                        @foreach($models as $sta)
                                            <option value="{{$sta['modelId']}}">{{$sta['modelName']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @else
                                   <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$list->modelName}}</h5>
                                @endif
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Master List</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                @if($show==1 && $list['listId'] == $ids)
                                    @if($select==1)
                                    <label for="green-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                        <input type="checkbox" wire:model="select" value="" id="green-toggle" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>                    
                                    <span class="ml-3 text-sm font-medium text-green-900 dark:text-green-100 ">Active List</span>
                                    </label>    
                                    @else
                                        <label for="red-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                            <input type="checkbox" wire:model="select" value="" id="red-toggle" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                        <span class="ml-3 text-sm font-medium text-red-900 dark:text-red-300">De - active List</span>                            
                                    </label>
                                    @endif
                                @else
                                    @if($list->statusId == 1)
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> 
                                                <span class=" text-gray-900 dark:text-gray-800">Active</span> 
                                        </div>
                                        @else
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> 
                                                <span class=" text-gray-900 dark:text-gray-800">Deactivated</span> 
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                @if($show==1 && $list['listId'] == $ids)
                                    <button type="submit" wire:click.prevent="saveEdit"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>    
                                @else                                    
                                    <button  data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" wire:click.prevent = "edit({{$list->listId}})" class=" flex items-center p-2 text-base font-normal py-2 px-4  text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">                                
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    <span class="">Edit</span>
                                    </button>
                                    <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Edit Master List
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                @endif
                                {{-- <button data-modal-toggle="view-modal" data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" wire:click.prevent = "view({{$list->listId}})" class=" flex items-center p-2 text-base font-normal py-2 px-4  text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">                                
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="">Info</span>
                                    </button>
                                    <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Info
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div> --}}
                                <a href="{{ URL('components', ['key1' => $list->listId] )}}" data-tooltip-target="tooltip-bottom1" data-tooltip-placement="bottom" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span class="">View</span>
                                </a>
                                <div id="tooltip-bottom1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    View Components
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="flex p-3 mt-4 space-x-3 md:mt-6">
                                <div class="flex flex-col bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    <span>Date Created :</span>
                                    <span>{{\Carbon\Carbon::parse($list->listCreated)->format('F d Y')}}</span>
                                </div>
                                <div class="flex flex-col bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    <span>Date Updated :</span>
                                    <span>{{\Carbon\Carbon::parse($list->listUpdated)->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>    
    </section>
    <section>
        @if(session()->has('failed'))
        <div class="fixed bottom-5 left-5">
            <div id="toast-warning" class="flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Warning icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{session('failed')}}</div>
                <button wire:click.prevent="closed" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        @endif
        @if(session()->has('message'))
        <div class="fixed bottom-5 left-5">
            <div id="toast-success" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{session('message')}}</div>
                <button wire:click.prevent="closed" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
        @endif
    </section>
    <section>
        <div class="flex justify-center font-bold py-2 px-4 rounded-lshadow-md ">
            {{$masterList->links()}}  
        <div>
    </section>
</div>
