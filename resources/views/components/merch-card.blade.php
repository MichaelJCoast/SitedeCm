@props(['merch'])

<!-- Card -->
<div class="flex flex-col h-full w-full 2xl:w-auto bg-black rounded-lg shadow-md overflow-hidden">
    <!-- Image -->
    <form method="get" action="merch/product">
    <input type="hidden" id="userId" name="id" value="{{$merch->id}}">
    <a class="block focus:outline-none focus-visible:ring-2" href="merch/product?id={{$merch->id}}">
        <figure class="relative h-0 pb-[70%] sm:pb-[100%] overflow-hidden">
            <img class="absolute inset-0 w-full h-full object-cover"
                src="../laravel/{{$merch->photo}}"
                width="320" height="180" alt="image">
        </figure>
    </a>
</form>
    <!-- Card Content -->
    <div class="flex-grow flex flex-col p-4">
        <!-- Card body -->
        <div class="flex-grow">
            <!-- Title -->
            <div class="mb-3">
                <h3 class="mb-2 text-sm lg:text-base tracking-tight font-semibold text-white">{{$merch->name}}</h3>
            </div>
            <div>
                <p class="font-semibold">€{{$merch->price}}</p>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById("id").submit = function() {
    location = "merch/product" + encodeURIComponent( document.getElementById("id").value );
    return false;
};
</script>