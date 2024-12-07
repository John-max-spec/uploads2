<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>

    <style>
        /* 页面样式 */
        body {
            background: #f4f4f4; /* 背景颜色 */
            color: #333; /* 文字颜色 */
            font-family: 'Helvetica', sans-serif;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        h1 {
            color: #5a5a5a;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .post-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 阴影效果 */
        }

        .post-content p {
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .post-content h2 {
            font-size: 1.5rem;
            color: #333;
            margin-top: 2rem;
        }

        .post-content a {
            color: #007bff;
            text-decoration: none;
        }

        .post-content a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>{{ $post->title }}</h1>

    <div class="post-content">
        <!-- 显示帖子正文 -->
        {!! $post->body !!}

        <!-- 插入段落 -->
        <p>
            In recent years, the different types of data sprang up and the scale of data got larger than before. It is difficult for relational database management systems to manage all the data. In order to meet the needs of web applications that require large-scale storage and development of data, as well as the need for data to be rigorous and orderly for convenient query and use, this project tends to use an approach combining databases of different types and functions. The combinations include several types, such as NoSQL database and distributed database, relational database and cloud database, etc. Especially the combination of MySQL database and MongoDB database is found to be well-suited for web applications. Having tested their performances under the same conditions, future work will focus on devoting one of them to managing certain data types respectively. The findings of the project will realize their reasonable division of labor in a web application.
        </p>
    </div>

</body>
</html>
