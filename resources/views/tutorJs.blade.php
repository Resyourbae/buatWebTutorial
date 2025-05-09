@extends('layouts.app')

@section('title', 'Tutor JavaScript')

@section('content')
        <!-- Contennya-->
        <style>
            .card {
                width: 400px;
                padding: 20px;
                border: 1px solid #0d1117;
                border-radius: 10px;
                background-color: #000;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                transition:
                    transform 0.2s,
                    box-shadow 0.2s;
                position: relative;
                font-family:
                    system-ui,
                    -apple-system,
                    BlinkMacSystemFont,
                    "Segoe UI",
                    Roboto,
                    Oxygen,
                    Ubuntu,
                    Cantarell,
                    "Open Sans",
                    "Helvetica Neue",
                    sans-serif;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            }

            .mac-header {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 15px;
            }

            .mac-header span {
                display: inline-block;
                width: 12px;
                height: 12px;
                border-radius: 50%;
            }

            .mac-header .red {
                background-color: #ff5f57;
            }

            .mac-header .yellow {
                background-color: #ffbd2e;
            }

            .mac-header .green {
                background-color: #28c941;
            }

            .card-title {
                font-size: 18px;
                font-weight: bold;
                margin: 0 0 10px;
                color: #e6e6ef;
            }

            .card-description {
                font-size: 14px;
                color: #666;
                margin-bottom: 15px;
            }

            .card .card-tag {
                display: inline-block;
                font-size: 10px;
                border-radius: 5px;
                background-color: #0d1117;
                padding: 4px;
                margin-block-end: 12px;
                color: #dcdcdc;
            }

            .code-editor {
                background-color: #0d1117;
                color: #dcdcdc;
                font-family:
                    system-ui,
                    -apple-system,
                    BlinkMacSystemFont,
                    "Segoe UI",
                    Roboto,
                    Oxygen,
                    Ubuntu,
                    Cantarell,
                    "Open Sans",
                    "Helvetica Neue",
                    monospace;
                font-size: 14px;
                line-height: 1.5;
                border-radius: 5px;
                padding: 15px;
                overflow: auto;
                height: 150px;
                border: 1px solid #333;
            }

            .code-editor::-webkit-scrollbar {
                width: 8px;
            }

            .code-editor::-webkit-scrollbar-thumb {
                background: #555;
                border-radius: 4px;
            }

            .code-editor pre code {
                white-space: pre-wrap;
                display: block;
            }

           
    .card2 {
      width: 250px;
      height: 300px;
      background: #15001f;
      border: 1px solid #c042ff;
      font-size: 14px;
      font-family: monospace;
      overflow: auto;
    }

    .titlebar {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: 21px;
      font-weight: 450;
      background-color: #2e0043;
      width: 100%;
      text-align: right;
    }

    .card2 button {
      width: 40px;
      height: 35px;
      margin-left: -5px;
      border: 0;
      outline: 0;
      background: transparent;
      transition: 0.2s;
    }

    button svg path, 
    button svg rect, 
    button svg polygon {
      fill: #ffffff;
    }

    button svg {
      width: 10px;
      height: 10px;
    }

    .close:hover {
      background-color: #e81123;
    }

    .maximize:hover {
      background-color: #c042ff2e;
    }

    .minimize:hover {
      background-color: #c042ff2e;
    }

    #pre {
      overflow: auto;
      width: 100%;
      padding: 10px;
      height: auto;
      color: #bafff8;
    }

    .curlies {
      color: #ff0000;
    }

    .sc {
      color: #e600ff;
    }

    .rounds {
      color: #ffffff;
    }

    .operator {
      color: #ffff00;
    }

    .s1 {
      color: #22ff00;
    }

    .s2 {
      color: #4281ff;
    }

    .s3 {
      color: #ff4284;
    }

    .s4 {
      color: #ffae00;
    }

    .s5 {
      color: #ffffff;
    }

    .s6 {
      color: #ffff00;
    }
        </style>

        <h1 class="text-3xl font-bold text-center">Welcome to the tutorial javascript</h1>
        <p class="text-center mt-4">Semangat Belajar!!🥳</p>

        <div class="info">
        <h2 class="text-1xl font-bold mt-8">1. DOM ( Document Object Model )</h2>
        <pre class="mt-2 ">DOM (Document Object Model) adalah......</pre>
        </div>
        <br>
        <hr>
        <div class="container flex justify-center gap-3 grid-cols-3 p-5 mt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card">
                <div class="mac-header">
                    <span class="red"></span>
                    <span class="yellow"></span>
                    <span class="green"></span>
                </div>
                <span class="card-title">Mac-Style Code Preview</span>
                <p class="card-description">
                    A glimpse of your code in a clean and Mac-like window. Click to explore!
                </p>
                <span class="card-tag">TAG JS</span> <span class="card-tag">TAG JS</span>
                <div class="code-editor">
                    <pre><code>&lt;h1&gt; Hello World &lt;/h1&gt;</code></pre>
                </div>
            </div>
            <div class="card">
                <div class="mac-header">
                    <span class="red"></span>
                    <span class="yellow"></span>
                    <span class="green"></span>
                </div>
                <span class="card-title">Mac-Style Code Preview</span>
                <p class="card-description">
                    A glimpse of your code in a clean and Mac-like window. Click to explore!
                </p>
                <span class="card-tag">TAG JS</span> <span class="card-tag">TAG JS</span>
                <div class="code-editor">
                    <pre><code>&lt;h1&gt; Hello World &lt;/h1&gt;</code></pre>
                </div>
            </div>
            <div class="card">
                <div class="mac-header">
                    <span class="red"></span>
                    <span class="yellow"></span>
                    <span class="green"></span>
                </div>
                <span class="card-title">JavaScript DOM Selection</span>
                <p class="card-description">
                    Learn how to select HTML elements using JavaScript DOM methods.
                </p>
                <span class="card-tag">DOM</span> <span class="card-tag">JavaScript</span>
                <div class="code-editor">
                    <pre><code>// contoh penulisan getElementById():
        const heading = document.getElementById('title');

        //contoh penulisan getElementsByClassName():
        const items = document.getElementsByClassName('item');

        // contoh penulisan getElementsByTagName():
        const paragraphs = document.getElementsByTagName('p');

        // querySelector():
        const firstHighlight = document.querySelector(".highlight");
        firstHighlight.style.fontWeight = "bold";</code></pre>
                </div>
            </div>
        </div>
        </div>

        {{-- <div class="info">
            <h2 class="text-1xl font-bold mt-8">1. DOM ( Document Object Model )</h2>
            <pre class="mt-2 ">DOM (Document Object Model) adalah......</pre>
        </div>
        <br>
        <hr>
        <div class="container flex justify-center gap-3 grid-cols-3 p-5 mt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card2">
                    <div class="titlebar">
                        <span class="buttons">
                            <button class="minimize">
                                <svg x="0px" y="0px" viewBox="0 0 10.2 1">
                                    <rect x="0" y="50%" width="10.2" height="1"></rect>
                                </svg>
                            </button>
                            <button class="maximize">
                                <svg viewBox="0 0 10 10">
                                    <path d="M0,0v10h10V0H0z M9,9H1V1h8V9z"></path>
                                </svg>
                            </button>
                            <button class="close">
                                <svg viewBox="0 0 10 10">
                                    <polygon
                                        points="10.2,0.7 9.5,0 5.1,4.4 0.7,0 0,0.7 4.4,5.1 0,9.5 0.7,10.2 5.1,5.8 9.5,10.2 10.2,9.5 5.8,5.1">
                                    </polygon>
                                </svg>
                            </button>
                        </span>
                    </div>
                    <div class="cppcode">
                        <pre id="pre"><code><span class="s1">#include</span> <span class="s2">&lt;iostream&gt;</span>
          using<span class="s3"> namespace </span>std<span class="sc">;</span>

          <span class="s3">int</span> <span class="s2">main()</span> <span class="curlies">{</span>

            <span class="s3">int</span> <span class="s4">a</span> <span class="operator">=</span> 12<span class="sc">;</span>
            <span class="s3">int</span> <span class="s4">b</span> <span class="operator">=</span> 5<span class="sc">;</span>

            <span class="s4">cout</span> <span class="s5">&lt;&lt;</span> <span class="s1">"Sum of the numbers
              is: "</span> <span class="s5">&lt;&lt;</span> <span class="rounds">(</span><span class="s4">a </span><span class="operator">+</span><span class="s4"> b</span><span class="rounds">)</span><span class="sc">;</span>

            <span class="s6">return</span> 0<span class="sc">;</span>

          <span class="curlies">}</span>
              </code></pre>
                    </div>
                </div>

            </div>
        </div> --}}

@endsection