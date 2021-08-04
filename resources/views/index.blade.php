@extends('layouts.app')

@section('style')

    <style>
        .content{
            width: 100%;
    height: 92vh;
    border: 1px solid;
    box-shadow: inset 0px 0px 20px 3px #000000;
    background-color: #000000c2;      
        }
        .rightBar{
            border: 1px solid;
            box-shadow: inset 0px 0px 8px 0px black;
            max-height: 100%;
            contain: content;
            overflow-x: hidden;
            overflow-y:hidden;

            transition: .6s
        }
        .rightBar:hover{
            overflow-y:visible;
        }

        .rightBar::-webkit-scrollbar {
            width: 1px;
            transition: .6s;
            
        }
        .rightBar:hover::-webkit-scrollbar {
            
            width: 9px;               /* ширина scrollbar */

        }
        
        .rightBar::-webkit-scrollbar-track {
            
        background: transparent;        /* цвет дорожки */
        transition: 1s;
        }
        .rightBar:hover::-webkit-scrollbar-track {
            
            background-color: #00000073;
        }
        .rightBar::-webkit-scrollbar-thumb {
            
            background-color: transparent
        }
        .rightBar:hover::-webkit-scrollbar-thumb {
        
        background-color: silver;    /* цвет плашки */

        }
        .btn-style{
            box-shadow: 0px 0px 9px 3px black;
            background-color: white;
            color: black;
            border-color: black;
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            text-decoration: underline;
            text-transform: capitalize;
            font-family: 'Roboto';
            line-height: .5rem;
            letter-spacing: .05rem;
            font-size: 14px;
            font-weight: 400;
            transition: .5s
        }
        .btn-style:hover{
            background-color: #5f6367;
            box-shadow: inset 0px 0px 9px 0px black;

        }
        .btn-style::after,
        .btn-style::before{
            content:"";
            display:block;
            position: absolute;
            width: 20%;
            height: 20%;
            border:2px solid;
            transition: all .6s ease;
            border-radius: 2px;

        }
        .btn-style::after{
            bottom: 0;
            right: 0;
            border-top-color: transparent; 
            border-left-color: transparent;
            border-bottom-color: #696d71;
            border-right-color: #696d71;
        }
        .btn-style::before{
            top: 0;
            left: 0;
            border-top-color: #696d71; 
            border-left-color: #696d71;
            border-bottom-color: transparent;
            border-right-color: transparent;
        }
        .btn-style:hover::after,
        .btn-style:hover::before{
            width: 100%;
            height: 100%;
        }



        .btn-active{
            color: white;
            border-color: black;
            box-shadow: inset 0px 0px 17px 0px black;
            background-color: #31373d!important;
        }
        .leftBar{
            overflow-y: auto;
            max-height: 81vh;
            padding-bottom: 10px;
        }
        /* jnjvox */
        .order{
                background: white;
                border-radius: 15px;
                position: relative;
                transition: 1.5s;
            }
        /*  */
    </style>    
@endsection
@section('content')
@if(!Auth::check())
    <div id="leftBar" class="leftBar col-md-10">

    </div>
@endif
@if(Auth::check())
    <div class="content row m-0 p-0">
        @if (session('status'))
            <div class="cloas-all">
                
            </div>
        @endif
        <div id="leftBar" class="leftBar col-md-10">

        </div>
        <div class="rightBar col-md-2">
            @include('rightBar')
        </div>
    </div>
    <div id="notification">

        @include('notification',['notifyOrder'=>$notifyOrder])
    </div>

@endif

{{-- @role('project-manager')
 Project Manager Panel
@endrole  --}}
{{-- //вернёт true для текущего пользователя, если ему дано право управлять пользователями
Gate::allows('manage-users'); --}}
@endsection
@section('script')
@if(Auth::check())
    <script>
        $( document ).ready(function(){
            $('#leftBar').load('/options/home #content');
        })

    </script>
    
@endif
@endsection