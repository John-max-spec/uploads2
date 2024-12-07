<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>

    <style>
        /* 直接在页面中设置 CSS */

        body {
            background: #8b4513; /* 深棕色背景 */
            color: white; /* 白色文字 */
            max-width: 800px;
            margin: auto;
            font-family: 'Helvetica', sans-serif;
            padding: 20px; /* 页面内边距，防止内容贴边 */
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #f1e5d1; /* 标题颜色浅米色 */
            margin-bottom: 2rem;
        }

        article {
            padding: 20px;
            background-color: #4e3629; /* 深棕色背景 */
            border-radius: 8px; /* 圆角边框 */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 阴影 */
            margin-bottom: 2rem; /* 文章之间的间距 */
        }

        article h2 {
            color: #f1e5d1; /* 标题颜色 */
            font-size: 1.8rem;
            font-weight: bold;
        }

        article a {
            color: #ffcc00; /* 链接颜色明亮黄 */
            text-decoration: none; /* 去掉下划线 */
        }

        article a:hover {
            text-decoration: underline; /* 鼠标悬停时显示下划线 */
        }

        article div {
            line-height: 1.8; /* 增加段落的行高 */
            margin-top: 1rem;
        }
    </style>

</head>
<body>

    <h1>My Blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach

</body>
</html>
