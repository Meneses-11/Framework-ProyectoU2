@extends('plantillas.menuCliente')
@section('contenido')

    <div class="container-items">
        <div class="item">
            <figure>
                <img src="img\bodas.jpeg" alt="bodas">
            </figure>
            <div class="info-producto">
                <h2>Paquete bodas</h2>
                <p class="Descripcion">Decoramos el salon conforme a lo que estas buscando </p>
               <!-- <button class="añade-carrito">Añadir al carrito </button>-->
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\tenis11.jpg" alt="travis1">
            </figure>
            <div class="info-producto">
                <h2>Tenis react Nike x Travis Scott</h2>
                <p class="precio">$3000</p>
                <button class ="añade-carrito">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\tenis333.jpg" alt="pelucheg">
            </figure>
            <div class="info-producto">
                <h2>Tenis Nike x Grateful Dead Green</h2>
                <p class="precio">$2300</p>
                <button class ="añade-carrito">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\tenis444.jpg" alt="travis2">
            </figure>
            <div class="info-producto">
                <h2>Tenis Nike Jordan 6 x Travis Scott olive</h2>
                <p class="precio">$3000</p>
                <button class ="añade-carrito">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\tenis55.jpg" alt="off">
            </figure>
            <div class="info-producto">
                <h2>Tenis Nike Jordan 4 x Off-White</h2>
                <p class="precio">$2700</p>
                <button class ="añade-carrito">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\tenis331.jpg" alt="peluchey">
            </figure>
            <div class="info-producto">
                <h2>Tenis Nike x Grateful Dead Yellow</h2>
                <p class="precio">$2500</p>
                <button class ="añade-carrito">Añadir al carrito</button>
            </div>
        </div>
    </div>

    <input class = 'salir' type="button" value="salir" onClick="history.go(-1);">

@endsection
