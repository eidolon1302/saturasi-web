<div class="container mx-auto my-28 p-4 "  x-data="{ tab: 'tab1' }">
    <div class="grid grid-cols-2">
        <ul class="grid mt-6 mr-20 grid-cols-1 justify-center">
            <li class="-mb-px mr-1">
                <a
                    class="inline-block rounded-t py-2 px-4 font-semibold hover:text-blue-800"  href="#" 
                    :class="{ 'bg-black text-blue-700 border-l border-t border-r': tab == 'tab1'}"
                    @click.prevent="tab = 'tab1'"
                    >Merch Shop</a>
            </li>
            <li class="-mb-px mr-1">
                <a
                    class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                    href="#"
                    :class="{ 'bg-black text-blue-700 border-l border-t': tab == 'tab2'}"
                    @click.prevent="tab = 'tab2'"
                    >Cek Ongkir</a
                    >
            </li>
            <li class="-mb-px mr-1">
                <a
                    class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                    href="#" 
                    :class="{ 'bg-black text-blue-700 border-l border-t border-r': tab == 'tab3'}"
                    @click.prevent="tab = 'tab3'"
                    >Footprint CCalc</a
                    >
            </li>
        </ul>
        <div class="content px-4 py-4">
            <div x-show="tab == 'tab1'">
            Tab1 content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt sunt, consectetur eos quod perferendis mollitia consequuntur natus, porro molestiae qui iusto deserunt rerum tempore voluptatum itaque. Ad, nisi esse cum quidem consequuntur ullam obcaecati.
            </div>
            <div x-show="tab == 'tab2'">
            Tab2 content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt sunt, consectetur eos quod perferendis mollitia consequuntur natus, porro molestiae qui iusto deserunt rerum tempore voluptatum itaque. Ad, nisi esse cum quidem consequuntur ullam obcaecati.
            </div>
            <div x-show="tab == 'tab3'">
            Tab3 content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt sunt, consectetur eos quod perferendis mollitia consequuntur natus, porro molestiae qui iusto deserunt rerum tempore voluptatum itaque. Ad, nisi esse cum quidem consequuntur ullam obcaecati.
            </div>
        
        </div>
    </div>
</div>