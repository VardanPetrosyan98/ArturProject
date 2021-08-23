<div class="container-fluid info-content" id="content">
    <div class="info-item @if($ordersCount>0)not-true @endif">
        <div class="card info-box">
        <span class="notefication-info">{{$ordersCount}}</span>
            <p class="count-info">{{$ordersCount}}</p>
            <h4 class="title-info ">новые <br> заказы</h4>
        </div>
    </div>
    <div class=" info-item">
        <div class="card info-box">
        <span class="notefication-info">0</span>

            <p class="count-info">10</p>
            <h4 class="title-info">Норма</h4>
        </div>
    </div>
    <div class=" info-item">
        <div class="card info-box">
        <span class="notefication-info">0</span>

            <p class="count-info">5</p>
            <h4 class="title-info">новости</h4>
        </div>
    </div>
    <div class=" info-item">
        <div class="card info-box">
        <span class="notefication-info">0</span>

            <p class="count-info">10</p>
            <h4 class="title-info">заказы</h4>
        </div>
    </div>
</div>
