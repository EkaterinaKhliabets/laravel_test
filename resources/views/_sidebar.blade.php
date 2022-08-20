<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home"/>
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="{{route('ecommerce.index')}}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{route('orders.index')}}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"/>
                </svg>
                Заказы
            </a>
        </li>
        <li>
            <a href="{{route('products.index')}}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid"/>
                </svg>
                Продукты
            </a>
        </li>
        <li>
            <a href="{{route('clients.index')}}" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle"/>
                </svg>
                Клиенты
            </a>
        </li>
    </ul>


</div>
