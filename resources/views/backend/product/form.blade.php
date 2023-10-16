@php


$categories = \App\Models\Product_Type::all();
$styles = \App\Models\Product_Style::all();
$sizes = \App\Models\Product_Size::all();
$index_type = $product->protype_id !== null ? \App\Models\Product_Type::where(['protype_id' => $product->protype_id])->first() : $categories[0];
$index_style = $product->prostyle_id !== null ? \App\Models\Product_Style::where(['prostyle_id' => $product->prostyle_id])->first() : $styles[0];
$index_size = $product->prosize_id !== null ? \App\Models\Product_Size::where(['prosize_id' => $product->prosize_id])->first() : $sizes[0];


// dd($index_type, $index_style, $index_size);
@endphp
<style>
    a:hover {
        cursor: pointer;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<button class="mt-3 btn btn-success w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory"
    aria-expanded="false" aria-controls="collapseCategory">
    Choose Product Type <span id="p_type_val">: {{ $index_type->protype_name }}
    </span>
</button>
<div class="collapse" id="collapseCategory">
    <div class="card card-body">
        <input type="hidden" id="p_type" name="p_type" value="{{ $index_type->protype_id }}">
        @foreach ($categories as $category)
        <a class="nav-link text-light" onclick="$(`#p_type`).val('{{ $category->protype_id }}'),
        $(`#p_type_val`).html(': {{ $category->protype_name }}'), $('#collapseCategory').collapse('hide')">{{
            $category->protype_name }}</a>
        <hr class="m-1">
        @endforeach
    </div>
</div>
<button class="mt-3 btn btn-success w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStyle"
    aria-expanded="false" aria-controls="collapseStyle">
    Choose Product Style <span id="p_style_val">: {{ $index_style->prostyle_name }}</span>
</button>
<div class="collapse" id="collapseStyle">
    <div class="card card-body">
        <input type="hidden" id="p_style" name="p_style" value="{{ $index_style->prostyle_id }}">
        @foreach ($styles as $style)
        <a class="nav-link text-light" onclick="$(`#p_style`).val('{{ $style->protype_id }}'),
            $(`#p_style_val`).html(': {{ $style->prostyle_name }}'), $('#collapseStyle').collapse('hide')">{{
            $style->prostyle_name }}</a>
        <hr class="m-1">
        @endforeach
    </div>
</div>
<button class="mt-3 btn btn-success w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSize"
    aria-expanded="false" aria-controls="collapseSize">
    Choose Product Size <span id="p_size_val">: {{ $index_size->prosize_name }}</span>
</button>
<div class="collapse" id="collapseSize">
    <div class="card card-body">
        <input type="hidden" id="p_size" name="p_size" value="{{ $index_size->prosize_id }}">
        @foreach ($sizes as $size)
        <a class="nav-link text-light" onclick="$(`#p_size`).val('{{ $size->protype_id }}'),
            $(`#p_size_val`).html(': {{ $size->prosize_name }}'), $('#collapseSize').collapse('hide')">{{
            $size->prosize_name }}</a>
        <hr class="m-1">
        @endforeach
    </div>
</div>
<label for="product_name"><strong>Product Name</strong></label>
<input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}"
    required>

<label for="product_productiondate" class="mt-2"><strong>Production Date</strong></label>
<input type="date" name="product_productiondate" id="product_productiondate" class="form-control"
    value="{{ $product->count() > 0 ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->product_productiondate ?? now())->format('Y-m-d') : ''; }}"
    required>

<label for="product_expirationdate" class="mt-2"><strong>Expiration Date</strong></label>
<input type="date" name="product_expirationdate" id="product_expirationdate" class="form-control"
    value="{{ $product->count() > 0 ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->product_expirationdate ?? now())->format('Y-m-d') : ''; }}"
    required>

<label for="product_image" class="mt-2"><strong>Product Image</strong></label>
<div class="text-center m-3">
    <img src="{{ asset('images/' . $product->product_image) }}" alt="image not found" id="product_image" height="150"
        width="150" />
</div>

<input type="file" name="product_image" id="product_image" class="form-control p-1" onchange="loadFile(event);">

<label for="product_costprice" class="mt-2"><strong>Product Price</strong></label>
<input type="number" step="any" min="0" name="product_costprice" id="product_costprice" class="form-control"
    value="{{ $product->product_costprice }}" required>

<label for="product_quantity" class="mt-2"><strong>Product Quantity</strong></label>
<input type="number" step="any" min="0" name="product_quantity" id="product_quantity" class="form-control"
    value="{{ $product->product_quantity }}" required>

<label for="product_desc" class="mt-2"><strong>Product Description <span
            id="product_desc_error"></span></strong></label>
<textarea name="product_desc" id="product_desc" class="form-control">{{ $product->product_desc }}</textarea>
<script>
    var loadFile = function(event) {
        var product_image = document.getElementById('product_image');
        product_image.src = URL.createObjectURL(event.target.files[0]);
        product_image.onload = function() {
            URL.revokeObjectURL(product_image.src)
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
