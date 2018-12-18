const posts = document.getElementById("posts");
const id = document.getElementsByName("post-id").value;
showPost();
commentArea(hasLogin());


function showPost() {
    const title = document.getElementById("title");
    title.textContent = getPostTitle();

    const mainPost = document.createElement("article");
    mainPost.className = "main post";
    const user = document.createElement("figure");
    user.className = "user";
    const userPicture = new Image();
    userPicture.src = getUserPicture();
    userPicture.alt = "user picture";
    const userName = document.createElement("p");
    userName.textContent = getUserName();
    const detail = document.createElement("pre");
    detail.className = "detail";
    detail.textContent = id;

    user.appendChild(userPicture);
    user.appendChild(userName);
    mainPost.appendChild(user);
    mainPost.appendChild(detail);
    posts.appendChild(mainPost);
}

function commentArea(login) {
    if (login === false) return 0;
    else {
        const input = document.createElement("article");
        input.className = "input";
        const comment = document.createElement("form");
        comment.action = "save-comment.php";
        comment.method = "post";
        const textArea = document.createElement("textArea");
        textArea.name = "comment";
        textArea.className = "comment";
        textArea.placeholder = id; //"Enter your comment of this project!";
        textArea.maxLength = 300;
        const submit = document.createElement("input");
        submit.name = "submit";
        submit.className = "submit";
        submit.type = "submit";
        submit.value = "submit";
        comment.appendChild(textArea);
        comment.appendChild(submit);
        input.appendChild(comment);
        posts.appendChild(input);
    }
}

function getUserPicture() {
    return "https://upload.wikimedia.org/wikipedia/commons/1/12/User_icon_2.svg";
}

function getUserName() {
    return "user name";
}

function getPostTitle() {
    return "Project Title A"
}

function getPostDetail() {
    return "The post detail.";
}

function hasLogin() {
    return true;
}

