
<div class="shop-shorter">
    <div class="single-shorter">
        <label>Show :</label>
        <form>
            {{csrf_field()}}
        <select id="show" name="show" class="show">
            <option value="{{Request::url()}}" selected="selected">06</option>
            <option value="{{Request::url()}}?show_product=9_pro">09</option>
            <option value="{{Request::url()}}?show_product=15_pro">15</option>
            <option value="{{Request::url()}}?show_product=25_pro">25</option>
            <option value="{{Request::url()}}">30</option>
        </select>
        </form>
    </div>
    <div class="single-shorter">
        <label>Sort By :</label>
        <form>
            {{csrf_field()}}
        <select name="sort" id="sort" class="sort">
            <option value="{{Request::url()}}" selected="selected">--Select--</option>
            <option value="{{Request::url()}}?sort_by=tang_dan">Giá Tăng Dần</option>
            <option value="{{Request::url()}}?sort_by=giam_dan">Giá Giảm Dần</option>
            <option value="{{Request::url()}}?sort_by=a_z">A-Z</option>
            <option value="{{Request::url()}}?sort_by=z_a">Z-A</option>
        </select>
        </form>
    </div>
</div>
<ul class="view-mode">
    <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
    <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
</ul>

