<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
  <h3>General</h3>
  <ul class="nav side-menu">
    <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="{{ route('item.index') }}">Item</a></li>
        <li><a href="{{ route('supplier.index') }}">Supplier</a></li>
        <li><a href="{{ route('stock.index') }}">Stock</a></li>
      </ul>
    </li>
    <li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="{{ route('stock.create') }}">Items In</a></li>
        <li><a href="{{ route('stock.out') }}">Items Out</a></li>
      </ul>
    </li>
    </ul>
</div>

</div>