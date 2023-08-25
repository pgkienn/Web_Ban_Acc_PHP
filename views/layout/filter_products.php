<div class="container row" style="margin: 0;">
    <div class="btn-group col-3 col-sm-3 col-lg-3 p-1 me-1">
        <button 
            class="btn btn-light btn-sm dropdown-toggle border rounded-pill" 
            id="price-display" type="button" data-bs-toggle="dropdown" aria-expanded="false"
            value="0"
        >
            Giá Bán
        </button>
        <ul class="dropdown-menu dropdown-menu-dark bg-dark">
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="price-items" value="1">0 - 100.0000</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="price-items" value="1">100.000 - 200.000</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="price-items" value="1">200.000 - 300.000</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="price-items" value="1">300.000 - 500.000</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="price-items" value="1">500.000 - 1.000.000</div></li>
        </ul>
    </div>
    <div class="btn-group col-4 col-sm-3 col-lg-3 p-1 ms-2">
        <button 
            class="btn btn-light btn-sm dropdown-toggle border rounded-pill" 
            id="time-display" type="button" data-bs-toggle="dropdown" aria-expanded="false"
            value="0"
        >
            Thời Gian
        </button>
        <ul class="dropdown-menu dropdown-menu-dark bg-dark">
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="time-items" value="1">Mới Nhất</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="time-items" value="1">Cũ Nhất</div></li>
        </ul>
    </div>
    <div class="btn-group col-3 col-sm-2 col-lg-3 p-1">
        <button 
            class="btn btn-light btn-sm dropdown-toggle border rounded-pill" 
            id="rank-display" type="button" data-bs-toggle="dropdown" aria-expanded="false"
            value="0"
        >
            Rank
        </button>
        <ul class="dropdown-menu dropdown-menu-dark bg-dark">
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="rank-items" value="1">Chiến Tướng</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="rank-items" value="1">Cao Thủ</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="rank-items" value="1">Tinh Anh</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="rank-items" value="1">Kim Cương</div></li>
            <li><div class="btn btn-dark w-100" class="dropdown-item" id="rank-items" value="1">Còn Lại...</div></li>
        </ul>
    </div>
    <div class="btn-group col-2 col-sm-4 col-lg-2 p-1">
        <button class="btn btn-dark btn-fullwidth" type="button"  id="filter">
            Lọc
        </button>
        
    </div>
</div>

<script>
    
    const price_items = document.querySelectorAll('#price-items');
    const time_items = document.querySelectorAll('#time-items');
    const rank_items = document.querySelectorAll('#rank-items');
    const price_dis = document.getElementById('price-display');
    const time_dis = document.getElementById('time-display');
    const rank_dis = document.getElementById('rank-display');
    const filter = document.querySelector("#filter");

    const event_Click = (items, display) => {
        items.forEach((item) => {
            item.addEventListener('click', (e) => {
                display.innerHTML = item.innerText;
                display.value = item.value;
            })
        });
    }

    const getvalue_filter = (name, valueDefault) => {
        if(name.value != valueDefault) {
            console.log(name.innerHTML);
        }
    }   

    event_Click(price_items, price_dis);
    event_Click(time_items, time_dis);
    event_Click(rank_items, rank_dis);
    
    filter.addEventListener("click", (e) => {
        getvalue_filter(price_dis, 0);
        getvalue_filter(time_dis, 0);
        getvalue_filter(rank_dis, 0);
    });
    
</script>
