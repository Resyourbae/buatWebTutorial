@extends('layouts.app')

@section('title', 'About')

@section('content')

    <style>
        .card {
            padding: 1rem;
            overflow: hidden;
            border: 1px solid #c5c5c5;
            border-radius: 12px;
            background-color: #d9d9d92f;
            backdrop-filter: blur(8px);
            min-width: 344px;
        }

        .wrap {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: relative;
            z-index: 10;
            border: 0.5px solid #525252;
            border-radius: 8px;
            overflow: hidden;
        }

        .terminal {
            display: flex;
            flex-direction: column;

            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas,
                "Liberation Mono", "Courier New", monospace;
        }

        .head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            min-height: 40px;
            padding-inline: 12px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            background-color: #202425;
        }

        .title {
            display: flex;
            align-items: center;
            gap: 8px;
            height: 2.5rem;
            user-select: none;
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #8e8e8e;
        }

        .title>svg {
            height: 18px;
            width: 18px;
            margin-top: 2px;
            color: #006adc;
        }

        .copy_toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem;
            border: 0.65px solid #c1c2c5;
            margin-left: auto;
            border-radius: 6px;
            background-color: #202425;
            color: #8e8e8e;
            cursor: pointer;
        }

        .copy_toggle>svg {
            width: 20px;
            height: 20px;
        }

        .copy_toggle:active>svg>path,
        .copy_toggle:focus-within>svg>path {
            animation: clipboard-check 500ms linear forwards;
        }

        .body {
            display: flex;
            flex-direction: column;
            position: relative;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            overflow-x: auto;
            padding: 1rem;
            line-height: 19px;
            color: white;
            background-color: black;
            white-space: nowrap;
        }

        .pre {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-wrap: nowrap;
            white-space: pre;
            background-color: transparent;
            overflow: hidden;
            box-sizing: border-box;
            font-size: 16px;
        }

        .pre code:nth-child(1) {
            color: #575757;
        }

        .pre code:nth-child(2) {
            color: #e34ba9;
        }

        .cmd {
            height: 19px;
            position: relative;
            display: flex;
            align-items: center;
            flex-direction: row;
        }

        .cmd::before {
            content: attr(data-cmd);
            position: relative;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            background-color: transparent;
            animation: inputs 8s steps(22) infinite;
        }

        .cmd::after {
            content: "";
            position: relative;
            display: block;
            height: 100%;
            overflow: hidden;
            background-color: transparent;
            border-right: 0.15em solid #e34ba9;
            animation: cursor 0.5s step-end infinite alternate, blinking 0.5s infinite;
        }

        @keyframes blinking {

            20%,
            80% {
                transform: scaleY(1);
            }

            50% {
                transform: scaleY(0);
            }
        }

        @keyframes cursor {
            50% {
                border-right-color: transparent;
            }
        }

        @keyframes inputs {

            0%,
            100% {
                width: 0;
            }

            10%,
            90% {
                width: 58px;
            }

            30%,
            70% {
                width: 215px;
                max-width: max-content;
            }
        }

        @keyframes clipboard-check {
            100% {
                color: #fff;
                d: path("M 9 5 H 7 a 2 2 0 0 0 -2 2 v 12 a 2 2 0 0 0 2 2 h 10 a 2 2 0 0 0 2 -2 V 7 a 2 2 0 0 0 -2 -2 h -2 M 9 5 a 2 2 0 0 0 2 2 h 2 a 2 2 0 0 0 2 -2 M 9 5 a 2 2 0 0 1 2 -2 h 2 a 2 2 0 0 1 2 2 m -6 9 l 2 2 l 4 -4"
                    );
            }
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 15px;
            width: 300px;
            height: 100px;
            position: relative;
            overflow: hidden;
            border-radius: 14px;
        }

        .content::before {
            content: "";
            position: absolute;
            left: 0%;
            top: 50%;
            transform: translateY(-50%);
            bottom: 0;
            width: 40px;
            height: 96px;
            background-image: linear-gradient(90deg, #0000001c, transparent);
            z-index: 2;
            border-radius: 10px 0 0 10px;
        }

        .content::after {
            content: "";
            position: absolute;
            right: 0%;
            top: 50%;
            transform: translateY(-50%);
            bottom: 0;
            width: 40px;
            height: 96px;
            background-image: linear-gradient(-90deg, #0000001c, transparent);
            z-index: 9;
            border-radius: 0 10px 10px 0;
        }

        .basic-marquee {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .basic-marquee .button {
            transition: all 0.3s ease;
        }

        .basic-marquee .button:hover {
            transform: scale(1.1);
            cursor: pointer;
        }

        .basic-marquee-1 {
            animation: marquee 15s linear infinite;
        }

        .basic-marquee-2 {
            animation: marquee 21s linear infinite;
        }

        .benefits {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            min-width: 900px;
            height: 100%;
            white-space: nowrap;
            overflow: hidden;
            position: absolute;
            inset: 0;
        }

        @keyframes marquee {
            0% {
                transform: translateX(-10%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .basic-marquee svg {
            width: 40px;
        }

        .basic-marquee button {
            background-color: transparent;
            border: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cls-1 {
            fill: #1ab7ea;
        }

        .cls-1,
        .cls-2 {
            fill-rule: evenodd;
        }

        .cls-2 {
            fill: #fff;
        }

        .cls-3 {
            fill: #ee8208;
            fill-rule: evenodd;
        }

        .cls-4 {
            fill: #fff;
        }

        .cls-5,
        .cls-6 {
            fill-rule: evenodd;
        }

        .cls-5 {
            fill: #48dd55;
        }

        .cls-6 {
            fill: #fff;
        }

        .cls-7 {
            fill: #0a66c2;
        }

        .cls-7,
        .cls-8 {
            fill-rule: evenodd;
        }

        .cls-8 {
            fill: #fff;
        }

        .cls-9 {
            fill: #10b7f4;
        }

        .cls-9,
        .cls-10 {
            fill-rule: evenodd;
        }

        .cls-10 {
            fill: #fff;
        }

        .cls-11 {
            fill: #1da1f2;
        }

        .cls-11,
        .cls-12 {
            fill-rule: evenodd;
        }

        .cls-12 {
            fill: #fff;
        }

        .cls-13 {
            fill: #ea4c89;
        }

        .cls-13,
        .cls-14 {
            fill-rule: evenodd;
        }

        .cls-14 {
            fill: #fff;
        }

        .cls-15 {
            fill: #1769ff;
        }

        .cls-15,
        .cls-16 {
            fill-rule: evenodd;
        }

        .cls-16 {
            fill: #fff;
        }

        .cls-17 {
            fill: #f26522;
        }

        .cls-17,
        .cls-18 {
            fill-rule: evenodd;
        }

        .cls-18 {
            fill: #fff;
        }
    </style>

    <h1 class="text-3xl font-bold text-center">About Us</h1>
    <p class="text-center mt-4">Learn more about our platform and team.</p>

    {{-- aplikasi animation start --}}
    <div class="flex justify-center">
        <div class="container px-5 py-4 mt-8">
            <div class="grid grid-cols-1 place-items-center">
                <div class="content">
                    <div class="benefits">
                        <div class="basic-marquee basic-marquee-1">
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-1"></path>
                                        <path
                                            d="M98.16,44.33q-.5,10.72-15,29.38-15,19.46-25.36,19.47Q51.4,93.18,47,81.33,44,70.46,41,59.59q-3.29-11.87-7.08-11.85c-.54,0-2.47,1.16-5.76,3.45l-3.46-4.45c3.63-3.1,7.21-6.36,10.69-9.51Q42.67,31,46.3,30.63q8.58-.82,10.56,11.72,2.13,13.55,3,16.84c1.65,7.49,3.45,11.24,5.44,11.24q2.3,0,6.93-7.3t5-11.09c.44-4.19-1.21-6.3-5-6.3A13.55,13.55,0,0,0,66.77,47Q72.19,29.2,87.46,29.71q11.31.3,10.67,14.67h0l0-.05Z"
                                            class="cls-2"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-3"></path>
                                        <path
                                            d="M69.22,79.38A34.34,34.34,0,0,0,83,73.45a5.73,5.73,0,0,0-7.17-8.94A24.84,24.84,0,0,1,61.5,68.69a25.46,25.46,0,0,1-14.43-4.18,5.73,5.73,0,0,0-7.17,8.94,34.93,34.93,0,0,0,14.21,6L42,92.07a5.73,5.73,0,1,0,8.25,8l11.23-12,12.36,12A5.73,5.73,0,1,0,82,92L69.22,79.38Z"
                                            class="cls-4"></path>
                                        <path
                                            d="M61.78,20.48A21.07,21.07,0,1,0,82.85,41.54,21.06,21.06,0,0,0,61.78,20.48Zm0,29.77a8.71,8.71,0,1,1,8.71-8.71,8.71,8.71,0,0,1-8.71,8.71Z"
                                            class="cls-4"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 132.004 132" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient id="b">
                                                <stop stop-color="#3771c8" offset="0"></stop>
                                                <stop offset=".128" stop-color="#3771c8"></stop>
                                                <stop stop-opacity="0" stop-color="#60f" offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="a">
                                                <stop stop-color="#fd5" offset="0"></stop>
                                                <stop stop-color="#fd5" offset=".1"></stop>
                                                <stop stop-color="#ff543e" offset=".5"></stop>
                                                <stop stop-color="#c837ab" offset="1"></stop>
                                            </linearGradient>
                                            <radialGradient fy="578.088" fx="158.429"
                                                gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.402 454.004)"
                                                gradientUnits="userSpaceOnUse" xlink:href="#a" r="65" cy="578.088"
                                                cx="158.429" id="c"></radialGradient>
                                            <radialGradient fy="473.455" fx="147.694"
                                                gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.348 -458.493)"
                                                gradientUnits="userSpaceOnUse" xlink:href="#b" r="65" cy="473.455"
                                                cx="147.694" id="d"></radialGradient>
                                        </defs>
                                        <path transform="translate(1.004 1)"
                                            d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z"
                                            fill="url(#c)"></path>
                                        <path transform="translate(1.004 1)"
                                            d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z"
                                            fill="url(#d)"></path>
                                        <path
                                            d="M66.004 18c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C18.06 51.327 18 52.964 18 66s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97c-3.18 0-5.76 2.577-5.76 5.758 0 3.18 2.58 5.76 5.76 5.76 3.18 0 5.76-2.58 5.76-5.76 0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C79.617 90.645 90.65 79.613 90.65 66S79.616 41.35 66.003 41.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z"
                                            fill="#fff"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient gradientUnits="userSpaceOnUse"
                                                gradientTransform="matrix(0.19, 0, 0, -0.19, 0.81, 98.89)" y2="-2164.82"
                                                x2="1337.28" y1="518.24" x1="1337.28" id="linear-gradient">
                                                <stop stop-color="#61fd7d" offset="0"></stop>
                                                <stop stop-color="#2bb826" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <path transform="translate(0 0)"
                                            d="M512,382.07c0,2.8-.09,8.88-.26,13.58-.41,11.49-1.32,26.32-2.7,33.07a109.76,109.76,0,0,1-9.27,27.71,98.45,98.45,0,0,1-43.43,43.39,110.21,110.21,0,0,1-27.87,9.28c-6.69,1.35-21.41,2.24-32.82,2.65-4.71.17-10.79.25-13.58.25l-252.1,0c-2.8,0-8.88-.09-13.58-.26-11.49-.41-26.32-1.32-33.07-2.69a110.37,110.37,0,0,1-27.72-9.28A98.5,98.5,0,0,1,12.18,456.3,110.21,110.21,0,0,1,2.9,428.43C1.55,421.74.66,407,.25,395.61.08,390.91,0,384.82,0,382l0-252.1c0-2.8.09-8.88.25-13.58C.71,104.86,1.62,90,3,83.28a110.37,110.37,0,0,1,9.27-27.72A98.59,98.59,0,0,1,55.7,12.18,110.21,110.21,0,0,1,83.57,2.9C90.26,1.55,105,.66,116.39.25,121.09.08,127.18,0,130,0l252.1,0c2.8,0,8.88.09,13.58.25C407.14.71,422,1.62,428.72,3a110.37,110.37,0,0,1,27.72,9.27A98.59,98.59,0,0,1,499.82,55.7a110.21,110.21,0,0,1,9.28,27.87c1.35,6.69,2.24,21.41,2.65,32.82.17,4.7.25,10.79.25,13.58Z"
                                            class="cls-5"></path>
                                        <path transform="translate(0 0)"
                                            d="M379.56,131.67A172.4,172.4,0,0,0,256.67,80.73C161,80.73,83.05,158.64,83.05,254.42a173.47,173.47,0,0,0,23.2,86.82l-24.65,90,92.08-24.17a173.55,173.55,0,0,0,83,21.17h.07c95.73,0,173.69-77.91,173.69-173.69A172.73,172.73,0,0,0,379.53,131.7l0,0ZM256.72,399a144.17,144.17,0,0,1-73.52-20.14l-5.29-3.15L123.27,390l14.59-53.27-3.42-5.47a143.29,143.29,0,0,1-22.11-76.81C112.33,174.81,177.1,110,256.8,110A144.34,144.34,0,0,1,401.12,254.48c-.07,79.67-64.83,144.46-144.41,144.46v0ZM335.87,290.8c-4.32-2.2-25.68-12.67-29.65-14.12s-6.85-2.19-9.8,2.2-11.22,14.11-13.76,17-5.06,3.29-9.37,1.09-18.35-6.77-34.92-21.56c-12.88-11.5-21.61-25.74-24.15-30s-.29-6.71,1.92-8.83c2-1.93,4.32-5.06,6.51-7.6s2.88-4.32,4.32-7.26.74-5.42-.35-7.6-9.8-23.55-13.34-32.25c-3.49-8.51-7.12-7.32-9.79-7.47s-5.42-.13-8.29-.13a16,16,0,0,0-11.57,5.41c-4,4.32-15.2,14.86-15.2,36.22s15.54,42,17.72,44.91,30.61,46.76,74.14,65.54c10.34,4.44,18.42,7.11,24.72,9.18a60,60,0,0,0,27.32,1.71c8.35-1.23,25.68-10.49,29.31-20.62s3.63-18.83,2.55-20.62-3.91-3-8.29-5.22l0,0Z"
                                            class="cls-6"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.31" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z"
                                            class="cls-7"></path>
                                        <path
                                            d="M49.19,47.41H64.72v8h.22c2.17-3.88,7.45-8,15.34-8,16.39,0,19.42,10.2,19.42,23.47V98.94H83.51V74c0-5.71-.12-13.06-8.42-13.06s-9.72,6.21-9.72,12.65v25.4H49.19V47.41ZM40,31.79a8.42,8.42,0,1,1-8.42-8.42A8.43,8.43,0,0,1,40,31.79ZM23.18,47.41H40V98.94H23.18V47.41Z"
                                            class="cls-8"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.39" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27.4,0H95.48a27.48,27.48,0,0,1,27.4,27.4V95a27.48,27.48,0,0,1-27.4,27.41H27.4A27.48,27.48,0,0,1,0,95V27.4A27.48,27.48,0,0,1,27.4,0Z"
                                            class="cls-1"></path>
                                        <path d="M37.07,32.34A14.41,14.41,0,1,1,22.66,46.75,14.41,14.41,0,0,1,37.07,32.34Z"
                                            class="cls-10"></path>
                                        <path d="M85.74,32.34A14.41,14.41,0,1,1,71.33,46.75,14.41,14.41,0,0,1,85.74,32.34Z"
                                            class="cls-10"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient y2="507.468" x2="251.069" y1=".003" x1="251.069"
                                                gradientUnits="userSpaceOnUse" id="prefix__a">
                                                <stop stop-color="#6364FF" offset="0"></stop>
                                                <stop stop-color="#563ACC" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <path
                                            d="M105 0h302c57.928.155 104.845 47.072 105 104.996V407c-.155 57.926-47.072 104.844-104.996 104.998L105 512C47.074 511.844.156 464.926.002 407.003L0 105C.156 47.072 47.074.155 104.997 0H105z"
                                            fill="url(#prefix__a)"></path>
                                        <path
                                            d="M399.681 169.996c-4.462-33.167-33.37-59.307-67.639-64.37-5.782-.857-27.685-3.972-78.429-3.972h-.378c-50.757 0-61.645 3.115-67.427 3.972-33.314 4.922-63.738 28.409-71.119 61.97-3.55 16.527-3.929 34.852-3.269 51.659.94 24.105 1.122 48.166 3.312 72.172a339.605 339.605 0 007.9 47.34c7.016 28.76 35.419 52.695 63.246 62.461a169.628 169.628 0 0092.531 4.883 135.476 135.476 0 0010.005-2.735c7.465-2.372 16.208-5.024 22.637-9.683a.705.705 0 00.209-.245.695.695 0 00.084-.315V369.87a.673.673 0 00-.263-.53.687.687 0 00-.578-.13 256.39 256.39 0 01-60.046 7.017c-34.802 0-44.162-16.513-46.84-23.387a72.424 72.424 0 01-4.071-18.437.67.67 0 01.248-.559.672.672 0 01.593-.129 251.583 251.583 0 0059.064 7.016c4.785 0 9.557 0 14.341-.129 20.01-.559 41.104-1.584 60.789-5.429.493-.097.984-.182 1.404-.307 31.055-5.965 60.609-24.68 63.611-72.075.111-1.866.393-19.543.393-21.478.014-6.581 2.118-46.68-.308-71.317zm-49.97 37.265v82.399h-32.654v-79.972c0-16.837-7.017-25.424-21.288-25.424-15.691 0-23.549 10.159-23.549 30.22v43.777h-32.455v-43.777c0-20.061-7.874-30.22-23.562-30.22-14.188 0-21.274 8.587-21.274 25.424v79.972H162.29v-82.399c0-16.837 4.298-30.213 12.895-40.128 8.868-9.891 20.502-14.971 34.941-14.971 16.713 0 29.342 6.426 37.762 19.264l8.126 13.638 8.139-13.638c8.419-12.838 21.049-19.264 37.733-19.264 14.426 0 26.058 5.08 34.956 14.971 8.589 9.906 12.877 23.282 12.869 40.128z"
                                            fill-rule="nonzero" fill="#fff"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M105 0h302c57.928.155 104.845 47.072 105 104.996V407c-.155 57.926-47.072 104.844-104.996 104.998L105 512C47.074 511.844.156 464.926.002 407.003L0 105C.156 47.072 47.074.155 104.997 0H105z"
                                            fill="#5865F2"></path>
                                        <g data-name="å¾å± 2">
                                            <g data-name="Discord Logos">
                                                <path data-name="Discord Logo - Large - White"
                                                    d="M368.896 153.381a269.506 269.506 0 00-67.118-20.637 186.88 186.88 0 00-8.57 17.475 250.337 250.337 0 00-37.247-2.8c-12.447 0-24.955.946-37.25 2.776-2.511-5.927-5.427-11.804-8.592-17.454a271.73 271.73 0 00-67.133 20.681c-42.479 62.841-53.991 124.112-48.235 184.513a270.622 270.622 0 0082.308 41.312c6.637-8.959 12.582-18.497 17.63-28.423a173.808 173.808 0 01-27.772-13.253c2.328-1.688 4.605-3.427 6.805-5.117 25.726 12.083 53.836 18.385 82.277 18.385 28.442 0 56.551-6.302 82.279-18.387 2.226 1.817 4.503 3.557 6.805 5.117a175.002 175.002 0 01-27.823 13.289 197.847 197.847 0 0017.631 28.4 269.513 269.513 0 0082.363-41.305l-.007.007c6.754-70.045-11.538-130.753-48.351-184.579zM201.968 300.789c-16.04 0-29.292-14.557-29.292-32.465s12.791-32.592 29.241-32.592 29.599 14.684 29.318 32.592c-.282 17.908-12.919 32.465-29.267 32.465zm108.062 0c-16.066 0-29.267-14.557-29.267-32.465s12.791-32.592 29.267-32.592c16.475 0 29.522 14.684 29.241 32.592-.281 17.908-12.894 32.465-29.241 32.465z"
                                                    fill-rule="nonzero" fill="#fff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-1"></path>
                                        <path
                                            d="M98.16,44.33q-.5,10.72-15,29.38-15,19.46-25.36,19.47Q51.4,93.18,47,81.33,44,70.46,41,59.59q-3.29-11.87-7.08-11.85c-.54,0-2.47,1.16-5.76,3.45l-3.46-4.45c3.63-3.1,7.21-6.36,10.69-9.51Q42.67,31,46.3,30.63q8.58-.82,10.56,11.72,2.13,13.55,3,16.84c1.65,7.49,3.45,11.24,5.44,11.24q2.3,0,6.93-7.3t5-11.09c.44-4.19-1.21-6.3-5-6.3A13.55,13.55,0,0,0,66.77,47Q72.19,29.2,87.46,29.71q11.31.3,10.67,14.67h0l0-.05Z"
                                            class="cls-2"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-3"></path>
                                        <path
                                            d="M69.22,79.38A34.34,34.34,0,0,0,83,73.45a5.73,5.73,0,0,0-7.17-8.94A24.84,24.84,0,0,1,61.5,68.69a25.46,25.46,0,0,1-14.43-4.18,5.73,5.73,0,0,0-7.17,8.94,34.93,34.93,0,0,0,14.21,6L42,92.07a5.73,5.73,0,1,0,8.25,8l11.23-12,12.36,12A5.73,5.73,0,1,0,82,92L69.22,79.38Z"
                                            class="cls-4"></path>
                                        <path
                                            d="M61.78,20.48A21.07,21.07,0,1,0,82.85,41.54,21.06,21.06,0,0,0,61.78,20.48Zm0,29.77a8.71,8.71,0,1,1,8.71-8.71,8.71,8.71,0,0,1-8.71,8.71Z"
                                            class="cls-4"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 132.004 132" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient id="b">
                                                <stop stop-color="#3771c8" offset="0"></stop>
                                                <stop offset=".128" stop-color="#3771c8"></stop>
                                                <stop stop-opacity="0" stop-color="#60f" offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="a">
                                                <stop stop-color="#fd5" offset="0"></stop>
                                                <stop stop-color="#fd5" offset=".1"></stop>
                                                <stop stop-color="#ff543e" offset=".5"></stop>
                                                <stop stop-color="#c837ab" offset="1"></stop>
                                            </linearGradient>
                                            <radialGradient fy="578.088" fx="158.429"
                                                gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.402 454.004)"
                                                gradientUnits="userSpaceOnUse" xlink:href="#a" r="65" cy="578.088"
                                                cx="158.429" id="c"></radialGradient>
                                            <radialGradient fy="473.455" fx="147.694"
                                                gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.348 -458.493)"
                                                gradientUnits="userSpaceOnUse" xlink:href="#b" r="65" cy="473.455"
                                                cx="147.694" id="d"></radialGradient>
                                        </defs>
                                        <path transform="translate(1.004 1)"
                                            d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z"
                                            fill="url(#c)"></path>
                                        <path transform="translate(1.004 1)"
                                            d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z"
                                            fill="url(#d)"></path>
                                        <path
                                            d="M66.004 18c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C18.06 51.327 18 52.964 18 66s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97c-3.18 0-5.76 2.577-5.76 5.758 0 3.18 2.58 5.76 5.76 5.76 3.18 0 5.76-2.58 5.76-5.76 0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C79.617 90.645 90.65 79.613 90.65 66S79.616 41.35 66.003 41.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z"
                                            fill="#fff"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient gradientUnits="userSpaceOnUse"
                                                gradientTransform="matrix(0.19, 0, 0, -0.19, 0.81, 98.89)" y2="-2164.82"
                                                x2="1337.28" y1="518.24" x1="1337.28" id="linear-gradient">
                                                <stop stop-color="#61fd7d" offset="0"></stop>
                                                <stop stop-color="#2bb826" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <path transform="translate(0 0)"
                                            d="M512,382.07c0,2.8-.09,8.88-.26,13.58-.41,11.49-1.32,26.32-2.7,33.07a109.76,109.76,0,0,1-9.27,27.71,98.45,98.45,0,0,1-43.43,43.39,110.21,110.21,0,0,1-27.87,9.28c-6.69,1.35-21.41,2.24-32.82,2.65-4.71.17-10.79.25-13.58.25l-252.1,0c-2.8,0-8.88-.09-13.58-.26-11.49-.41-26.32-1.32-33.07-2.69a110.37,110.37,0,0,1-27.72-9.28A98.5,98.5,0,0,1,12.18,456.3,110.21,110.21,0,0,1,2.9,428.43C1.55,421.74.66,407,.25,395.61.08,390.91,0,384.82,0,382l0-252.1c0-2.8.09-8.88.25-13.58C.71,104.86,1.62,90,3,83.28a110.37,110.37,0,0,1,9.27-27.72A98.59,98.59,0,0,1,55.7,12.18,110.21,110.21,0,0,1,83.57,2.9C90.26,1.55,105,.66,116.39.25,121.09.08,127.18,0,130,0l252.1,0c2.8,0,8.88.09,13.58.25C407.14.71,422,1.62,428.72,3a110.37,110.37,0,0,1,27.72,9.27A98.59,98.59,0,0,1,499.82,55.7a110.21,110.21,0,0,1,9.28,27.87c1.35,6.69,2.24,21.41,2.65,32.82.17,4.7.25,10.79.25,13.58Z"
                                            class="cls-5"></path>
                                        <path transform="translate(0 0)"
                                            d="M379.56,131.67A172.4,172.4,0,0,0,256.67,80.73C161,80.73,83.05,158.64,83.05,254.42a173.47,173.47,0,0,0,23.2,86.82l-24.65,90,92.08-24.17a173.55,173.55,0,0,0,83,21.17h.07c95.73,0,173.69-77.91,173.69-173.69A172.73,172.73,0,0,0,379.53,131.7l0,0ZM256.72,399a144.17,144.17,0,0,1-73.52-20.14l-5.29-3.15L123.27,390l14.59-53.27-3.42-5.47a143.29,143.29,0,0,1-22.11-76.81C112.33,174.81,177.1,110,256.8,110A144.34,144.34,0,0,1,401.12,254.48c-.07,79.67-64.83,144.46-144.41,144.46v0ZM335.87,290.8c-4.32-2.2-25.68-12.67-29.65-14.12s-6.85-2.19-9.8,2.2-11.22,14.11-13.76,17-5.06,3.29-9.37,1.09-18.35-6.77-34.92-21.56c-12.88-11.5-21.61-25.74-24.15-30s-.29-6.71,1.92-8.83c2-1.93,4.32-5.06,6.51-7.6s2.88-4.32,4.32-7.26.74-5.42-.35-7.6-9.8-23.55-13.34-32.25c-3.49-8.51-7.12-7.32-9.79-7.47s-5.42-.13-8.29-.13a16,16,0,0,0-11.57,5.41c-4,4.32-15.2,14.86-15.2,36.22s15.54,42,17.72,44.91,30.61,46.76,74.14,65.54c10.34,4.44,18.42,7.11,24.72,9.18a60,60,0,0,0,27.32,1.71c8.35-1.23,25.68-10.49,29.31-20.62s3.63-18.83,2.55-20.62-3.91-3-8.29-5.22l0,0Z"
                                            class="cls-6"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.31" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z"
                                            class="cls-7"></path>
                                        <path
                                            d="M49.19,47.41H64.72v8h.22c2.17-3.88,7.45-8,15.34-8,16.39,0,19.42,10.2,19.42,23.47V98.94H83.51V74c0-5.71-.12-13.06-8.42-13.06s-9.72,6.21-9.72,12.65v25.4H49.19V47.41ZM40,31.79a8.42,8.42,0,1,1-8.42-8.42A8.43,8.43,0,0,1,40,31.79ZM23.18,47.41H40V98.94H23.18V47.41Z"
                                            class="cls-8"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.39" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27.4,0H95.48a27.48,27.48,0,0,1,27.4,27.4V95a27.48,27.48,0,0,1-27.4,27.41H27.4A27.48,27.48,0,0,1,0,95V27.4A27.48,27.48,0,0,1,27.4,0Z"
                                            class="cls-1"></path>
                                        <path d="M37.07,32.34A14.41,14.41,0,1,1,22.66,46.75,14.41,14.41,0,0,1,37.07,32.34Z"
                                            class="cls-10"></path>
                                        <path d="M85.74,32.34A14.41,14.41,0,1,1,71.33,46.75,14.41,14.41,0,0,1,85.74,32.34Z"
                                            class="cls-10"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient y2="507.468" x2="251.069" y1=".003" x1="251.069"
                                                gradientUnits="userSpaceOnUse" id="prefix__a">
                                                <stop stop-color="#6364FF" offset="0"></stop>
                                                <stop stop-color="#563ACC" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <path
                                            d="M105 0h302c57.928.155 104.845 47.072 105 104.996V407c-.155 57.926-47.072 104.844-104.996 104.998L105 512C47.074 511.844.156 464.926.002 407.003L0 105C.156 47.072 47.074.155 104.997 0H105z"
                                            fill="url(#prefix__a)"></path>
                                        <path
                                            d="M399.681 169.996c-4.462-33.167-33.37-59.307-67.639-64.37-5.782-.857-27.685-3.972-78.429-3.972h-.378c-50.757 0-61.645 3.115-67.427 3.972-33.314 4.922-63.738 28.409-71.119 61.97-3.55 16.527-3.929 34.852-3.269 51.659.94 24.105 1.122 48.166 3.312 72.172a339.605 339.605 0 007.9 47.34c7.016 28.76 35.419 52.695 63.246 62.461a169.628 169.628 0 0092.531 4.883 135.476 135.476 0 0010.005-2.735c7.465-2.372 16.208-5.024 22.637-9.683a.705.705 0 00.209-.245.695.695 0 00.084-.315V369.87a.673.673 0 00-.263-.53.687.687 0 00-.578-.13 256.39 256.39 0 01-60.046 7.017c-34.802 0-44.162-16.513-46.84-23.387a72.424 72.424 0 01-4.071-18.437.67.67 0 01.248-.559.672.672 0 01.593-.129 251.583 251.583 0 0059.064 7.016c4.785 0 9.557 0 14.341-.129 20.01-.559 41.104-1.584 60.789-5.429.493-.097.984-.182 1.404-.307 31.055-5.965 60.609-24.68 63.611-72.075.111-1.866.393-19.543.393-21.478.014-6.581 2.118-46.68-.308-71.317zm-49.97 37.265v82.399h-32.654v-79.972c0-16.837-7.017-25.424-21.288-25.424-15.691 0-23.549 10.159-23.549 30.22v43.777h-32.455v-43.777c0-20.061-7.874-30.22-23.562-30.22-14.188 0-21.274 8.587-21.274 25.424v79.972H162.29v-82.399c0-16.837 4.298-30.213 12.895-40.128 8.868-9.891 20.502-14.971 34.941-14.971 16.713 0 29.342 6.426 37.762 19.264l8.126 13.638 8.139-13.638c8.419-12.838 21.049-19.264 37.733-19.264 14.426 0 26.058 5.08 34.956 14.971 8.589 9.906 12.877 23.282 12.869 40.128z"
                                            fill-rule="nonzero" fill="#fff"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M105 0h302c57.928.155 104.845 47.072 105 104.996V407c-.155 57.926-47.072 104.844-104.996 104.998L105 512C47.074 511.844.156 464.926.002 407.003L0 105C.156 47.072 47.074.155 104.997 0H105z"
                                            fill="#5865F2"></path>
                                        <g data-name="å¾å± 2">
                                            <g data-name="Discord Logos">
                                                <path data-name="Discord Logo - Large - White"
                                                    d="M368.896 153.381a269.506 269.506 0 00-67.118-20.637 186.88 186.88 0 00-8.57 17.475 250.337 250.337 0 00-37.247-2.8c-12.447 0-24.955.946-37.25 2.776-2.511-5.927-5.427-11.804-8.592-17.454a271.73 271.73 0 00-67.133 20.681c-42.479 62.841-53.991 124.112-48.235 184.513a270.622 270.622 0 0082.308 41.312c6.637-8.959 12.582-18.497 17.63-28.423a173.808 173.808 0 01-27.772-13.253c2.328-1.688 4.605-3.427 6.805-5.117 25.726 12.083 53.836 18.385 82.277 18.385 28.442 0 56.551-6.302 82.279-18.387 2.226 1.817 4.503 3.557 6.805 5.117a175.002 175.002 0 01-27.823 13.289 197.847 197.847 0 0017.631 28.4 269.513 269.513 0 0082.363-41.305l-.007.007c6.754-70.045-11.538-130.753-48.351-184.579zM201.968 300.789c-16.04 0-29.292-14.557-29.292-32.465s12.791-32.592 29.241-32.592 29.599 14.684 29.318 32.592c-.282 17.908-12.919 32.465-29.267 32.465zm108.062 0c-16.066 0-29.267-14.557-29.267-32.465s12.791-32.592 29.267-32.592c16.475 0 29.522 14.684 29.241 32.592-.281 17.908-12.894 32.465-29.241 32.465z"
                                                    fill-rule="nonzero" fill="#fff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="basic-marquee basic-marquee-2">
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <g fill-rule="nonzero">
                                            <path
                                                d="M245.49 512h21.32c115.73 0 173.61 0 209.56-35.94 35.94-35.95 35.63-93.8 35.63-209.25v-21.62c0-115.43 0-173.3-35.63-209.25C440.73 0 382.54 0 266.81 0h-21.32C129.74 0 71.89 0 35.94 35.94 0 71.89 0 129.72 0 245.19v21.62c0 115.45 0 173.3 35.94 209.25C71.89 512 129.74 512 245.49 512z"
                                                fill="#07F"></path>
                                            <path
                                                d="M274.75 369.15c-115.45 0-185.51-80.1-188.23-213.2h58.47c1.82 97.78 46.3 139.27 80.4 147.73V155.95h56.05v84.36c32.89-3.65 67.3-42.02 78.89-84.36h55.12c-8.83 52.08-46.29 90.46-72.79 106.29 26.5 12.81 69.14 46.31 85.58 106.91h-60.6c-12.8-40.51-44.17-71.88-86.2-76.14v76.14h-6.69z"
                                                fill="#FEFEFE"></path>
                                        </g>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-11"></path>
                                        <path
                                            d="M97.52,39.06A29.27,29.27,0,0,1,89,41.39a15,15,0,0,0,6.51-8.19,29.71,29.71,0,0,1-9.4,3.59,14.81,14.81,0,0,0-25.6,10.13,14.45,14.45,0,0,0,.38,3.37A42,42,0,0,1,30.41,34.82a14.86,14.86,0,0,0-2,7.44h0A14.76,14.76,0,0,0,35,54.57a14.85,14.85,0,0,1-6.71-1.84v.19A14.8,14.8,0,0,0,40.15,67.43a14.74,14.74,0,0,1-3.9.52,16.2,16.2,0,0,1-2.8-.26A14.85,14.85,0,0,0,47.28,78,29.86,29.86,0,0,1,25.35,84.1a41.92,41.92,0,0,0,22.7,6.65c27.23,0,42.13-22.56,42.13-42.12,0-.65,0-1.28,0-1.91a29.83,29.83,0,0,0,7.38-7.65h0Z"
                                            class="cls-12"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <rect ry="105" rx="105" height="512" width="512" fill="#FFFC00"></rect>
                                        <g fill-rule="nonzero">
                                            <path
                                                d="M424.16 341.5c-1.47-4.87-8.51-8.3-8.51-8.3v.01c-.65-.37-1.25-.67-1.76-.92-11.72-5.67-22.1-12.47-30.86-20.22-7.03-6.22-13.05-13.07-17.89-20.37-5.9-8.89-8.67-16.32-9.87-20.34-.66-2.62-.55-3.66 0-5.03.47-1.14 1.81-2.25 2.47-2.75 3.96-2.8 10.33-6.93 14.24-9.46 3.39-2.19 6.31-4.09 8.01-5.27 5.51-3.85 9.27-7.77 11.49-11.99 2.88-5.47 3.22-11.48.98-17.41-3.02-7.98-10.47-12.75-19.94-12.75-2.11 0-4.27.24-6.42.71-5.42 1.17-10.57 3.1-14.88 4.78a.472.472 0 01-.64-.46c.46-10.67.97-25-.21-38.64-1.07-12.33-3.6-22.72-7.75-31.77-4.17-9.09-9.58-15.82-13.82-20.67-4.05-4.64-11.13-11.45-21.83-17.57-15.07-8.62-32.22-12.99-50.97-12.99-18.71 0-35.84 4.37-50.92 12.98-11.33 6.47-18.57 13.79-21.88 17.58-4.24 4.85-9.64 11.58-13.81 20.67-4.15 9.05-6.69 19.44-7.75 31.77-1.19 13.66-.71 26.87-.22 38.63.02.35-.33.59-.65.47-4.3-1.68-9.46-3.61-14.87-4.78-2.15-.47-4.31-.71-6.42-.71-9.47 0-16.92 4.77-19.94 12.75-2.24 5.93-1.9 11.94.98 17.41 2.23 4.22 5.99 8.14 11.49 11.99 1.7 1.18 4.62 3.08 8.01 5.27 3.83 2.48 10.02 6.49 14 9.28.49.36 2.17 1.62 2.7 2.93.57 1.4.67 2.46-.05 5.24-1.24 4.06-4.01 11.39-9.8 20.13-4.85 7.3-10.87 14.15-17.9 20.37-8.76 7.75-19.14 14.55-30.86 20.22-.55.27-1.21.61-1.93 1.02v-.01s-7 3.58-8.32 8.2c-1.95 6.83 3.24 13.22 8.56 16.65 8.68 5.59 19.25 8.6 25.38 10.24 1.7.45 3.25.87 4.66 1.31.88.29 3.09 1.12 4.03 2.33 1.19 1.53 1.33 3.43 1.76 5.56.68 3.59 2.17 8.06 6.62 11.12 4.88 3.38 11.09 3.62 18.95 3.92 8.22.32 18.46.71 30.16 4.57 5.43 1.8 10.35 4.82 16.04 8.31 11.89 7.31 26.69 16.4 51.98 16.4 25.3 0 40.2-9.14 52.17-16.49 5.66-3.47 10.55-6.47 15.85-8.22 11.71-3.87 21.94-4.26 30.16-4.57 7.86-.3 14.07-.54 18.96-3.92 4.75-3.28 6.13-8.17 6.75-11.87.33-1.83.56-3.46 1.61-4.81.89-1.15 2.93-1.95 3.89-2.29 1.45-.45 3.05-.88 4.82-1.35 6.13-1.64 13.81-3.58 23.16-8.86 11.19-6.32 11.95-14.17 10.79-18.03z"
                                                fill="#fff"></path>
                                            <path
                                                d="M408.78 351.17c-15.32 8.46-25.5 7.56-33.42 12.65-6.73 4.33-2.75 13.67-7.64 17.04-6 4.15-23.76-.29-46.68 7.28-18.91 6.25-30.98 24.23-65.03 24.23-34.12 0-45.83-17.89-65.02-24.23-22.93-7.57-40.68-3.13-46.69-7.28-4.88-3.37-.91-12.71-7.63-17.04-7.92-5.09-18.11-4.19-33.42-12.65-9.75-5.38-4.22-8.72-.97-10.29 55.49-26.86 64.33-68.34 64.73-71.46.48-3.72 1.01-6.65-3.1-10.45-3.96-3.66-21.55-14.54-26.42-17.95-8.08-5.63-11.63-11.27-9.01-18.19 1.8-4.78 6.29-6.59 11.01-6.59 1.47 0 2.96.18 4.4.49 8.86 1.93 17.47 6.36 22.45 7.57.68.16 1.29.24 1.83.24 2.64 0 3.58-1.34 3.4-4.37-.57-9.7-1.94-28.6-.42-46.26 2.1-24.29 9.94-36.33 19.25-46.98 4.47-5.12 25.46-27.3 65.61-27.3 40.26 0 61.15 22.18 65.62 27.3 9.31 10.65 17.15 22.69 19.24 46.98 1.53 17.66.21 36.57-.41 46.26-.21 3.19.75 4.37 3.4 4.37.54 0 1.15-.08 1.83-.24 4.98-1.21 13.58-5.64 22.45-7.57 1.44-.31 2.93-.49 4.4-.49 4.72 0 9.2 1.81 11.01 6.59 2.62 6.92-.93 12.56-9.01 18.19-4.88 3.41-22.46 14.29-26.43 17.95-4.1 3.8-3.57 6.73-3.1 10.45.4 3.12 9.25 44.6 64.74 71.46 3.25 1.57 8.78 4.91-.97 10.29zM265.06 79.91h-18.08c-17.08 1.22-32.88 5.93-47.09 14.05-12.03 6.87-20 14.55-24.58 19.78-10.99 12.57-21.52 28.35-24.12 58.45-.74 8.55-.92 17.3-.79 25.49-.75-.19-1.5-.36-2.26-.53-2.88-.63-5.79-.94-8.65-.94-13.79 0-25.2 7.48-29.75 19.53-3.29 8.69-2.75 17.93 1.51 26.01 3.02 5.74 7.85 10.88 14.77 15.7 1.84 1.29 4.69 3.14 8.3 5.48 1.95 1.26 4.8 3.11 7.6 4.95.42.3 1.93 1.4 2.43 2.45.58 1.2.6 2.49-.26 4.87-1.48 3.27-3.6 7.26-6.6 11.66-8.93 13.05-21.69 24.1-37.98 32.93-8.64 4.6-17.61 7.63-21.4 17.93-.85 2.31-1.28 4.71-1.28 7.14.01 5.77 2.45 11.69 7.55 16.93l.01-.01c2.39 2.57 5.39 4.85 9.18 6.93 8.89 4.91 16.45 7.32 22.4 8.97 1.04.31 3.46 1.1 4.52 2.02 2.65 2.32 2.27 5.81 5.8 10.91 2.13 3.18 4.6 5.34 6.62 6.74 7.4 5.11 15.72 5.43 24.52 5.77 7.96.3 16.97.65 27.28 4.05 4.26 1.41 8.69 4.13 13.83 7.29 11.05 6.79 25.77 15.83 49.06 17.63h16.81c23.32-1.81 38.14-10.89 49.26-17.72 5.1-3.13 9.51-5.83 13.66-7.2 10.29-3.41 19.31-3.75 27.27-4.05 8.8-.34 17.11-.66 24.51-5.77 2.33-1.61 5.24-4.22 7.55-8.22 2.53-4.31 2.47-7.35 4.85-9.43.97-.85 3.11-1.58 4.25-1.94 6-1.65 13.66-4.05 22.7-9.05 4.01-2.21 7.15-4.63 9.61-7.39.03-.03.06-.07.09-.1 6.81-7.33 8.52-15.92 5.73-23.5-2.49-6.77-7.23-10.4-12.63-13.4a40.52 40.52 0 00-2.72-1.44c-1.61-.83-3.25-1.64-4.9-2.49-16.83-8.92-29.97-20.18-39.1-33.53-3.08-4.51-5.22-8.58-6.7-11.89-.78-2.23-.75-3.48-.19-4.64.42-.88 1.55-1.8 2.15-2.24 2.89-1.91 5.89-3.86 7.91-5.16 3.6-2.34 6.45-4.19 8.3-5.48 6.91-4.82 11.74-9.96 14.77-15.7 4.26-8.08 4.8-17.32 1.51-26.01-4.56-12.05-15.96-19.53-29.75-19.53-2.86 0-5.77.31-8.66.94-.76.17-1.51.34-2.25.53.12-8.19-.05-16.94-.79-25.49-2.6-30.1-13.13-45.88-24.13-58.45-4.58-5.24-12.55-12.93-24.52-19.77-14.2-8.13-30.02-12.84-47.13-14.06z">
                                            </path>
                                        </g>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-13"></path>
                                        <path
                                            d="M61.44,97.79A36.35,36.35,0,1,1,97.79,61.44,36.38,36.38,0,0,1,61.44,97.79Zm24-55.93c-.66.88-5.87,7.56-17.34,12.24.72,1.48,1.42,3,2.06,4.51.23.54.45,1.06.67,1.6a73.28,73.28,0,0,1,21.62,1,30.92,30.92,0,0,0-7-19.33Zm6.61,24.55a45.46,45.46,0,0,0-19.33-1.32,135.32,135.32,0,0,1,6,22.13,31,31,0,0,0,13.3-20.81ZM73.57,90.06A129.72,129.72,0,0,0,67,66.52l-.2.08C49.23,72.7,42.94,84.84,42.39,86a31,31,0,0,0,31.18,4.09Zm-35.2-7.82C39.08,81,47.6,66.93,63.6,61.75c.4-.12.81-.25,1.22-.36-.78-1.77-1.63-3.54-2.51-5.27a115.42,115.42,0,0,1-31.9,4.43c0,.32,0,.63,0,1a30.92,30.92,0,0,0,8,20.74ZM31.06,55.12a116.9,116.9,0,0,0,28.71-3.77,192.76,192.76,0,0,0-11.52-18A31.14,31.14,0,0,0,31.06,55.12ZM54.17,31.3A166.07,166.07,0,0,1,65.76,49.47C76.8,45.34,81.47,39.05,82,38.26a30.91,30.91,0,0,0-20.59-7.83,32.8,32.8,0,0,0-7.27.87Z"
                                            class="cls-14"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-15"></path>
                                        <path
                                            d="M75.25,74.38a8.23,8.23,0,0,0,9.49.54,5.26,5.26,0,0,0,2.17-2.62h7.15c-1.15,3.56-2.89,6.09-5.27,7.62a15.42,15.42,0,0,1-8.56,2.31,17.09,17.09,0,0,1-6.31-1.12,13.36,13.36,0,0,1-4.77-3.18,14.64,14.64,0,0,1-3-4.92,18.24,18.24,0,0,1-1.06-6.31,17.34,17.34,0,0,1,1.09-6.18,14.43,14.43,0,0,1,3.1-5,14.76,14.76,0,0,1,4.8-3.29,15.37,15.37,0,0,1,6.17-1.21,13.9,13.9,0,0,1,6.57,1.47,13.3,13.3,0,0,1,4.62,3.91A15.9,15.9,0,0,1,94,62.07a21.12,21.12,0,0,1,.57,6.59H73.24a8.22,8.22,0,0,0,2,5.71ZM47.49,40.64a25,25,0,0,1,5.33.52,11.45,11.45,0,0,1,4.12,1.69A8,8,0,0,1,59.62,46a11,11,0,0,1,.93,4.79,9,9,0,0,1-1.4,5.15A10.29,10.29,0,0,1,55,59.28a9.78,9.78,0,0,1,5.62,3.8A12.62,12.62,0,0,1,61.25,75,10.43,10.43,0,0,1,58,78.69a14.27,14.27,0,0,1-4.64,2.11,21.08,21.08,0,0,1-5.34.69H28.24V40.65H47.49Zm-.67,33.88a11.3,11.3,0,0,0,2.51-.26,5.8,5.8,0,0,0,2.11-.87,4.3,4.3,0,0,0,1.47-1.63,5.69,5.69,0,0,0,.53-2.64c0-2.1-.6-3.61-1.78-4.52A7.52,7.52,0,0,0,47,63.27H37.22V74.51h9.6v0Zm-.5-17.39a6.47,6.47,0,0,0,4-1.14,4.28,4.28,0,0,0,1.53-3.71,4.87,4.87,0,0,0-.51-2.35,3.72,3.72,0,0,0-1.39-1.42,5.42,5.42,0,0,0-2-.72,12.49,12.49,0,0,0-2.31-.2h-8.4v9.54h9.1ZM71.57,43.94H88.13v4H71.57v-4Zm13,14.91A6.11,6.11,0,0,0,80,57.2a7,7,0,0,0-3.23.66,6.39,6.39,0,0,0-2.06,1.64,5.68,5.68,0,0,0-1.08,2.08,9.26,9.26,0,0,0-.38,2H86.46a7.91,7.91,0,0,0-1.88-4.68Z"
                                            class="cls-16"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <rect ry="105" rx="105" height="512" width="512" fill="#ff4500"></rect>
                                        <path
                                            d="M307.75 303.16c-12.98 0-23.54-10.55-23.54-23.54 0-12.98 10.56-23.53 23.54-23.53 12.97 0 23.53 10.55 23.53 23.53 0 12.99-10.56 23.54-23.53 23.54zm4.14 38.66c-16.06 16.04-46.85 17.29-55.9 17.29-9.06 0-39.84-1.25-55.89-17.3a6.096 6.096 0 010-8.62c2.38-2.39 6.25-2.39 8.64 0 10.12 10.13 31.78 13.71 47.25 13.71 15.47 0 37.13-3.58 47.28-13.71a6.09 6.09 0 018.63.01c2.38 2.38 2.37 6.24-.01 8.62zm-131.25-62.2c0-12.98 10.56-23.53 23.55-23.53 12.97 0 23.53 10.55 23.53 23.53s-10.56 23.53-23.53 23.53c-12.99 0-23.55-10.55-23.55-23.53zm225.93-23.53c0-18.2-14.76-32.96-32.95-32.96-8.88 0-16.93 3.53-22.86 9.25-22.53-16.26-53.56-26.76-88.12-27.97l15.01-70.62 49.04 10.42c.59 12.48 10.81 22.43 23.42 22.43 13.01 0 23.54-10.54 23.54-23.54s-10.53-23.54-23.54-23.54c-9.24 0-17.16 5.38-21.01 13.14l-54.77-11.64a5.758 5.758 0 00-4.42.82 5.876 5.876 0 00-2.55 3.71L250.6 204.4c-35.09.97-66.62 11.48-89.43 27.91-5.92-5.68-13.93-9.18-22.79-9.18-18.19 0-32.95 14.76-32.95 32.96 0 13.38 8 24.88 19.47 30.04-.51 3.28-.79 6.6-.79 9.97 0 50.69 59.02 91.8 131.81 91.8 72.8 0 131.82-41.11 131.82-91.8 0-3.35-.28-6.66-.77-9.91 11.54-5.13 19.6-16.67 19.6-30.1z"
                                            fill-rule="nonzero" fill="#fff"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-17"></path>
                                        <path
                                            d="M30.38,30.35V42.27A50.29,50.29,0,0,1,80.57,92.52h12A62.23,62.23,0,0,0,30.38,30.36Z"
                                            class="cls-18"></path>
                                        <path
                                            d="M30.36,51.48V63.39A29.12,29.12,0,0,1,59.43,92.53h12a41.09,41.09,0,0,0-41-41.05Z"
                                            class="cls-18"></path>
                                        <path d="M38.63,75.94a8.26,8.26,0,1,0,8.29,8.26,8.29,8.29,0,0,0-8.29-8.26Z"
                                            class="cls-18"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <g fill-rule="nonzero">
                                            <path
                                                d="M245.49 512h21.32c115.73 0 173.61 0 209.56-35.94 35.94-35.95 35.63-93.8 35.63-209.25v-21.62c0-115.43 0-173.3-35.63-209.25C440.73 0 382.54 0 266.81 0h-21.32C129.74 0 71.89 0 35.94 35.94 0 71.89 0 129.72 0 245.19v21.62c0 115.45 0 173.3 35.94 209.25C71.89 512 129.74 512 245.49 512z"
                                                fill="#07F"></path>
                                            <path
                                                d="M274.75 369.15c-115.45 0-185.51-80.1-188.23-213.2h58.47c1.82 97.78 46.3 139.27 80.4 147.73V155.95h56.05v84.36c32.89-3.65 67.3-42.02 78.89-84.36h55.12c-8.83 52.08-46.29 90.46-72.79 106.29 26.5 12.81 69.14 46.31 85.58 106.91h-60.6c-12.8-40.51-44.17-71.88-86.2-76.14v76.14h-6.69z"
                                                fill="#FEFEFE"></path>
                                        </g>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-11"></path>
                                        <path
                                            d="M97.52,39.06A29.27,29.27,0,0,1,89,41.39a15,15,0,0,0,6.51-8.19,29.71,29.71,0,0,1-9.4,3.59,14.81,14.81,0,0,0-25.6,10.13,14.45,14.45,0,0,0,.38,3.37A42,42,0,0,1,30.41,34.82a14.86,14.86,0,0,0-2,7.44h0A14.76,14.76,0,0,0,35,54.57a14.85,14.85,0,0,1-6.71-1.84v.19A14.8,14.8,0,0,0,40.15,67.43a14.74,14.74,0,0,1-3.9.52,16.2,16.2,0,0,1-2.8-.26A14.85,14.85,0,0,0,47.28,78,29.86,29.86,0,0,1,25.35,84.1a41.92,41.92,0,0,0,22.7,6.65c27.23,0,42.13-22.56,42.13-42.12,0-.65,0-1.28,0-1.91a29.83,29.83,0,0,0,7.38-7.65h0Z"
                                            class="cls-12"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <rect ry="105" rx="105" height="512" width="512" fill="#FFFC00"></rect>
                                        <g fill-rule="nonzero">
                                            <path
                                                d="M424.16 341.5c-1.47-4.87-8.51-8.3-8.51-8.3v.01c-.65-.37-1.25-.67-1.76-.92-11.72-5.67-22.1-12.47-30.86-20.22-7.03-6.22-13.05-13.07-17.89-20.37-5.9-8.89-8.67-16.32-9.87-20.34-.66-2.62-.55-3.66 0-5.03.47-1.14 1.81-2.25 2.47-2.75 3.96-2.8 10.33-6.93 14.24-9.46 3.39-2.19 6.31-4.09 8.01-5.27 5.51-3.85 9.27-7.77 11.49-11.99 2.88-5.47 3.22-11.48.98-17.41-3.02-7.98-10.47-12.75-19.94-12.75-2.11 0-4.27.24-6.42.71-5.42 1.17-10.57 3.1-14.88 4.78a.472.472 0 01-.64-.46c.46-10.67.97-25-.21-38.64-1.07-12.33-3.6-22.72-7.75-31.77-4.17-9.09-9.58-15.82-13.82-20.67-4.05-4.64-11.13-11.45-21.83-17.57-15.07-8.62-32.22-12.99-50.97-12.99-18.71 0-35.84 4.37-50.92 12.98-11.33 6.47-18.57 13.79-21.88 17.58-4.24 4.85-9.64 11.58-13.81 20.67-4.15 9.05-6.69 19.44-7.75 31.77-1.19 13.66-.71 26.87-.22 38.63.02.35-.33.59-.65.47-4.3-1.68-9.46-3.61-14.87-4.78-2.15-.47-4.31-.71-6.42-.71-9.47 0-16.92 4.77-19.94 12.75-2.24 5.93-1.9 11.94.98 17.41 2.23 4.22 5.99 8.14 11.49 11.99 1.7 1.18 4.62 3.08 8.01 5.27 3.83 2.48 10.02 6.49 14 9.28.49.36 2.17 1.62 2.7 2.93.57 1.4.67 2.46-.05 5.24-1.24 4.06-4.01 11.39-9.8 20.13-4.85 7.3-10.87 14.15-17.9 20.37-8.76 7.75-19.14 14.55-30.86 20.22-.55.27-1.21.61-1.93 1.02v-.01s-7 3.58-8.32 8.2c-1.95 6.83 3.24 13.22 8.56 16.65 8.68 5.59 19.25 8.6 25.38 10.24 1.7.45 3.25.87 4.66 1.31.88.29 3.09 1.12 4.03 2.33 1.19 1.53 1.33 3.43 1.76 5.56.68 3.59 2.17 8.06 6.62 11.12 4.88 3.38 11.09 3.62 18.95 3.92 8.22.32 18.46.71 30.16 4.57 5.43 1.8 10.35 4.82 16.04 8.31 11.89 7.31 26.69 16.4 51.98 16.4 25.3 0 40.2-9.14 52.17-16.49 5.66-3.47 10.55-6.47 15.85-8.22 11.71-3.87 21.94-4.26 30.16-4.57 7.86-.3 14.07-.54 18.96-3.92 4.75-3.28 6.13-8.17 6.75-11.87.33-1.83.56-3.46 1.61-4.81.89-1.15 2.93-1.95 3.89-2.29 1.45-.45 3.05-.88 4.82-1.35 6.13-1.64 13.81-3.58 23.16-8.86 11.19-6.32 11.95-14.17 10.79-18.03z"
                                                fill="#fff"></path>
                                            <path
                                                d="M408.78 351.17c-15.32 8.46-25.5 7.56-33.42 12.65-6.73 4.33-2.75 13.67-7.64 17.04-6 4.15-23.76-.29-46.68 7.28-18.91 6.25-30.98 24.23-65.03 24.23-34.12 0-45.83-17.89-65.02-24.23-22.93-7.57-40.68-3.13-46.69-7.28-4.88-3.37-.91-12.71-7.63-17.04-7.92-5.09-18.11-4.19-33.42-12.65-9.75-5.38-4.22-8.72-.97-10.29 55.49-26.86 64.33-68.34 64.73-71.46.48-3.72 1.01-6.65-3.1-10.45-3.96-3.66-21.55-14.54-26.42-17.95-8.08-5.63-11.63-11.27-9.01-18.19 1.8-4.78 6.29-6.59 11.01-6.59 1.47 0 2.96.18 4.4.49 8.86 1.93 17.47 6.36 22.45 7.57.68.16 1.29.24 1.83.24 2.64 0 3.58-1.34 3.4-4.37-.57-9.7-1.94-28.6-.42-46.26 2.1-24.29 9.94-36.33 19.25-46.98 4.47-5.12 25.46-27.3 65.61-27.3 40.26 0 61.15 22.18 65.62 27.3 9.31 10.65 17.15 22.69 19.24 46.98 1.53 17.66.21 36.57-.41 46.26-.21 3.19.75 4.37 3.4 4.37.54 0 1.15-.08 1.83-.24 4.98-1.21 13.58-5.64 22.45-7.57 1.44-.31 2.93-.49 4.4-.49 4.72 0 9.2 1.81 11.01 6.59 2.62 6.92-.93 12.56-9.01 18.19-4.88 3.41-22.46 14.29-26.43 17.95-4.1 3.8-3.57 6.73-3.1 10.45.4 3.12 9.25 44.6 64.74 71.46 3.25 1.57 8.78 4.91-.97 10.29zM265.06 79.91h-18.08c-17.08 1.22-32.88 5.93-47.09 14.05-12.03 6.87-20 14.55-24.58 19.78-10.99 12.57-21.52 28.35-24.12 58.45-.74 8.55-.92 17.3-.79 25.49-.75-.19-1.5-.36-2.26-.53-2.88-.63-5.79-.94-8.65-.94-13.79 0-25.2 7.48-29.75 19.53-3.29 8.69-2.75 17.93 1.51 26.01 3.02 5.74 7.85 10.88 14.77 15.7 1.84 1.29 4.69 3.14 8.3 5.48 1.95 1.26 4.8 3.11 7.6 4.95.42.3 1.93 1.4 2.43 2.45.58 1.2.6 2.49-.26 4.87-1.48 3.27-3.6 7.26-6.6 11.66-8.93 13.05-21.69 24.1-37.98 32.93-8.64 4.6-17.61 7.63-21.4 17.93-.85 2.31-1.28 4.71-1.28 7.14.01 5.77 2.45 11.69 7.55 16.93l.01-.01c2.39 2.57 5.39 4.85 9.18 6.93 8.89 4.91 16.45 7.32 22.4 8.97 1.04.31 3.46 1.1 4.52 2.02 2.65 2.32 2.27 5.81 5.8 10.91 2.13 3.18 4.6 5.34 6.62 6.74 7.4 5.11 15.72 5.43 24.52 5.77 7.96.3 16.97.65 27.28 4.05 4.26 1.41 8.69 4.13 13.83 7.29 11.05 6.79 25.77 15.83 49.06 17.63h16.81c23.32-1.81 38.14-10.89 49.26-17.72 5.1-3.13 9.51-5.83 13.66-7.2 10.29-3.41 19.31-3.75 27.27-4.05 8.8-.34 17.11-.66 24.51-5.77 2.33-1.61 5.24-4.22 7.55-8.22 2.53-4.31 2.47-7.35 4.85-9.43.97-.85 3.11-1.58 4.25-1.94 6-1.65 13.66-4.05 22.7-9.05 4.01-2.21 7.15-4.63 9.61-7.39.03-.03.06-.07.09-.1 6.81-7.33 8.52-15.92 5.73-23.5-2.49-6.77-7.23-10.4-12.63-13.4a40.52 40.52 0 00-2.72-1.44c-1.61-.83-3.25-1.64-4.9-2.49-16.83-8.92-29.97-20.18-39.1-33.53-3.08-4.51-5.22-8.58-6.7-11.89-.78-2.23-.75-3.48-.19-4.64.42-.88 1.55-1.8 2.15-2.24 2.89-1.91 5.89-3.86 7.91-5.16 3.6-2.34 6.45-4.19 8.3-5.48 6.91-4.82 11.74-9.96 14.77-15.7 4.26-8.08 4.8-17.32 1.51-26.01-4.56-12.05-15.96-19.53-29.75-19.53-2.86 0-5.77.31-8.66.94-.76.17-1.51.34-2.25.53.12-8.19-.05-16.94-.79-25.49-2.6-30.1-13.13-45.88-24.13-58.45-4.58-5.24-12.55-12.93-24.52-19.77-14.2-8.13-30.02-12.84-47.13-14.06z">
                                            </path>
                                        </g>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-13"></path>
                                        <path
                                            d="M61.44,97.79A36.35,36.35,0,1,1,97.79,61.44,36.38,36.38,0,0,1,61.44,97.79Zm24-55.93c-.66.88-5.87,7.56-17.34,12.24.72,1.48,1.42,3,2.06,4.51.23.54.45,1.06.67,1.6a73.28,73.28,0,0,1,21.62,1,30.92,30.92,0,0,0-7-19.33Zm6.61,24.55a45.46,45.46,0,0,0-19.33-1.32,135.32,135.32,0,0,1,6,22.13,31,31,0,0,0,13.3-20.81ZM73.57,90.06A129.72,129.72,0,0,0,67,66.52l-.2.08C49.23,72.7,42.94,84.84,42.39,86a31,31,0,0,0,31.18,4.09Zm-35.2-7.82C39.08,81,47.6,66.93,63.6,61.75c.4-.12.81-.25,1.22-.36-.78-1.77-1.63-3.54-2.51-5.27a115.42,115.42,0,0,1-31.9,4.43c0,.32,0,.63,0,1a30.92,30.92,0,0,0,8,20.74ZM31.06,55.12a116.9,116.9,0,0,0,28.71-3.77,192.76,192.76,0,0,0-11.52-18A31.14,31.14,0,0,0,31.06,55.12ZM54.17,31.3A166.07,166.07,0,0,1,65.76,49.47C76.8,45.34,81.47,39.05,82,38.26a30.91,30.91,0,0,0-20.59-7.83,32.8,32.8,0,0,0-7.27.87Z"
                                            class="cls-14"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-15"></path>
                                        <path
                                            d="M75.25,74.38a8.23,8.23,0,0,0,9.49.54,5.26,5.26,0,0,0,2.17-2.62h7.15c-1.15,3.56-2.89,6.09-5.27,7.62a15.42,15.42,0,0,1-8.56,2.31,17.09,17.09,0,0,1-6.31-1.12,13.36,13.36,0,0,1-4.77-3.18,14.64,14.64,0,0,1-3-4.92,18.24,18.24,0,0,1-1.06-6.31,17.34,17.34,0,0,1,1.09-6.18,14.43,14.43,0,0,1,3.1-5,14.76,14.76,0,0,1,4.8-3.29,15.37,15.37,0,0,1,6.17-1.21,13.9,13.9,0,0,1,6.57,1.47,13.3,13.3,0,0,1,4.62,3.91A15.9,15.9,0,0,1,94,62.07a21.12,21.12,0,0,1,.57,6.59H73.24a8.22,8.22,0,0,0,2,5.71ZM47.49,40.64a25,25,0,0,1,5.33.52,11.45,11.45,0,0,1,4.12,1.69A8,8,0,0,1,59.62,46a11,11,0,0,1,.93,4.79,9,9,0,0,1-1.4,5.15A10.29,10.29,0,0,1,55,59.28a9.78,9.78,0,0,1,5.62,3.8A12.62,12.62,0,0,1,61.25,75,10.43,10.43,0,0,1,58,78.69a14.27,14.27,0,0,1-4.64,2.11,21.08,21.08,0,0,1-5.34.69H28.24V40.65H47.49Zm-.67,33.88a11.3,11.3,0,0,0,2.51-.26,5.8,5.8,0,0,0,2.11-.87,4.3,4.3,0,0,0,1.47-1.63,5.69,5.69,0,0,0,.53-2.64c0-2.1-.6-3.61-1.78-4.52A7.52,7.52,0,0,0,47,63.27H37.22V74.51h9.6v0Zm-.5-17.39a6.47,6.47,0,0,0,4-1.14,4.28,4.28,0,0,0,1.53-3.71,4.87,4.87,0,0,0-.51-2.35,3.72,3.72,0,0,0-1.39-1.42,5.42,5.42,0,0,0-2-.72,12.49,12.49,0,0,0-2.31-.2h-8.4v9.54h9.1ZM71.57,43.94H88.13v4H71.57v-4Zm13,14.91A6.11,6.11,0,0,0,80,57.2a7,7,0,0,0-3.23.66,6.39,6.39,0,0,0-2.06,1.64,5.68,5.68,0,0,0-1.08,2.08,9.26,9.26,0,0,0-.38,2H86.46a7.91,7.91,0,0,0-1.88-4.68Z"
                                            class="cls-16"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 512 512" clip-rule="evenodd" fill-rule="evenodd"
                                        image-rendering="optimizeQuality" text-rendering="geometricPrecision"
                                        shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg">
                                        <rect ry="105" rx="105" height="512" width="512" fill="#ff4500"></rect>
                                        <path
                                            d="M307.75 303.16c-12.98 0-23.54-10.55-23.54-23.54 0-12.98 10.56-23.53 23.54-23.53 12.97 0 23.53 10.55 23.53 23.53 0 12.99-10.56 23.54-23.53 23.54zm4.14 38.66c-16.06 16.04-46.85 17.29-55.9 17.29-9.06 0-39.84-1.25-55.89-17.3a6.096 6.096 0 010-8.62c2.38-2.39 6.25-2.39 8.64 0 10.12 10.13 31.78 13.71 47.25 13.71 15.47 0 37.13-3.58 47.28-13.71a6.09 6.09 0 018.63.01c2.38 2.38 2.37 6.24-.01 8.62zm-131.25-62.2c0-12.98 10.56-23.53 23.55-23.53 12.97 0 23.53 10.55 23.53 23.53s-10.56 23.53-23.53 23.53c-12.99 0-23.55-10.55-23.55-23.53zm225.93-23.53c0-18.2-14.76-32.96-32.95-32.96-8.88 0-16.93 3.53-22.86 9.25-22.53-16.26-53.56-26.76-88.12-27.97l15.01-70.62 49.04 10.42c.59 12.48 10.81 22.43 23.42 22.43 13.01 0 23.54-10.54 23.54-23.54s-10.53-23.54-23.54-23.54c-9.24 0-17.16 5.38-21.01 13.14l-54.77-11.64a5.758 5.758 0 00-4.42.82 5.876 5.876 0 00-2.55 3.71L250.6 204.4c-35.09.97-66.62 11.48-89.43 27.91-5.92-5.68-13.93-9.18-22.79-9.18-18.19 0-32.95 14.76-32.95 32.96 0 13.38 8 24.88 19.47 30.04-.51 3.28-.79 6.6-.79 9.97 0 50.69 59.02 91.8 131.81 91.8 72.8 0 131.82-41.11 131.82-91.8 0-3.35-.28-6.66-.77-9.91 11.54-5.13 19.6-16.67 19.6-30.1z"
                                            fill-rule="nonzero" fill="#fff"></path>
                                    </svg>
                                </button>
                            </a>
                            <a class="social-media-link" href="#">
                                <button class="button">
                                    <svg viewBox="0 0 122.88 122.88" data-name="Layer 1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"
                                            class="cls-17"></path>
                                        <path
                                            d="M30.38,30.35V42.27A50.29,50.29,0,0,1,80.57,92.52h12A62.23,62.23,0,0,0,30.38,30.36Z"
                                            class="cls-18"></path>
                                        <path
                                            d="M30.36,51.48V63.39A29.12,29.12,0,0,1,59.43,92.53h12a41.09,41.09,0,0,0-41-41.05Z"
                                            class="cls-18"></path>
                                        <path d="M38.63,75.94a8.26,8.26,0,1,0,8.29,8.26,8.29,8.29,0,0,0-8.29-8.26Z"
                                            class="cls-18"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- aplikasi animation end --}}

    <div class="container mx-auto px-4 py-8 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 --> 
            <div class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                <img src="{{ asset('img/computer1.jpg') }}" alt="Learning Platform" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Learning Platform</h3>
                    <p class="dark:text-gray-300">
                        Platform pembelajaran interaktif untuk Web Development dengan fokus pada Laravel dan TailwindCSS.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                <img src="{{ asset('img/computer2.jpg') }}" alt="Community" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Our Community</h3>
                    <p class="dark:text-gray-300">
                        Bergabunglah dengan komunitas developer kami untuk berbagi pengetahuan dan pengalaman.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                <img src="{{ asset('img/computer3.jpg') }}" alt="Our Mission" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Our Mission</h3>
                    <p class="dark:text-gray-300">
                        Membantu developer pemula untuk menguasai teknologi web modern dengan cara yang efektif.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- terminal animation --}}
    <div class="container mx-auto px-4 py-8 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card">
                <div class="wrap">
                    <div class="terminal">
                        <hgroup class="head">
                            <p class="title">
                                <svg width="16px" height="16px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M439.55 236.05L244 40.45a28.87 28.87 0 0 0-40.81 0l-40.66 40.63 51.52 51.52c27.06-9.14 52.68 16.77 43.39 43.68l49.66 49.66c34.23-11.8 61.18 31 35.47 56.69-26.49 26.49-70.21-2.87-56-37.34L240.22 199v121.85c25.3 12.54 22.26 41.85 9.08 55a34.34 34.34 0 0 1-48.55 0c-17.57-17.6-11.07-46.91 11.25-56v-123c-20.8-8.51-24.6-30.74-18.64-45L142.57 101 8.45 235.14a28.86 28.86 0 0 0 0 40.81l195.61 195.6a28.86 28.86 0 0 0 40.8 0l194.69-194.69a28.86 28.86 0 0 0 0-40.81z" />
                                </svg>
                                Gitbash
                            </p>

                            <button class="copy_toggle" tabindex="-1" type="button">
                                <svg width="16px" height="16px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                    stroke="currentColor" fill="none">
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                    </path>
                                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                    </path>
                                </svg>
                            </button>
                        </hgroup>

                        <div class="body">
                            <pre class="pre">          <code>$&nbsp;</code>
                                            <code>npm&nbsp;</code>
                                            <code class="cmd" data-cmd="run-dev-love"></code>
                                          </pre>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Windows PowerShell animation --}}
            <div class="card">
                <div class="wrap">
                    <div class="terminal">
                        <hgroup class="head">
                            <p class="title">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="24" height="24" fill="#012456" />
                                    <path fill="#FFFFFF"
                                        d="M5.29 8.09l4.06 3.41-4.06 3.41a1 1 0 101.42 1.42l5-4.21a1 1 0 000-1.42l-5-4.21a1 1 0 00-1.42 1.42z" />
                                    <path fill="#FFFFFF" d="M12 16h7a1 1 0 000-2h-7a1 1 0 000 2z" />
                                </svg>
                                Windows PowerShell
                            </p>

                            <button class="copy_toggle" tabindex="-1" type="button">
                                <svg width="16px" height="16px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                    stroke="currentColor" fill="none">
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                    </path>
                                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                    </path>
                                </svg>
                            </button>
                        </hgroup>

                        <div class="body">
                            <pre class="pre">          <code>>&nbsp;</code>
                                            <code>npm&nbsp;</code>
                                            <code class="cmd" data-cmd="install-love"></code>
                                          </pre>
                        </div>
                    </div>
                </div>
            </div>

            {{-- cmd --}}

            <div class="card">
                <div class="wrap">
                    <div class="terminal">
                        <hgroup class="head">
                            <p class="title">
                                <svg width="16px" height="16px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                    stroke="currentColor" fill="none">
                                    <path
                                        d="M7 15L10 12L7 9M13 15H17M7.8 21H16.2C17.8802 21 18.7202 21 19.362 20.673C19.9265 20.3854 20.3854 19.9265 20.673 19.362C21 18.7202 21 17.8802 21 16.2V7.8C21 6.11984 21 5.27976 20.673 4.63803C20.3854 4.07354 19.9265 3.6146 19.362 3.32698C18.7202 3 17.8802 3 16.2 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21Z">
                                    </path>
                                </svg>
                                Terminal
                            </p>


                            <button class="copy_toggle" tabindex="-1" type="button">
                                <svg width="16px" height="16px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                    stroke="currentColor" fill="none">
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                    </path>
                                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                    </path>
                                </svg>
                            </button>
                        </hgroup>

                        <div class="body">
                            <pre class="pre">          <code>-&nbsp;</code>
                                                        <code>npm&nbsp;</code>
                                                        <code class="cmd" data-cmd="create-you-l@ke-me"></code>
                                                      </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        </div>
    </div>

@endsection