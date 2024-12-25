function secureBookmark() {
    const bookmarks = document.getElementById("bookmark_input").value;
    let bookmark_list = [];

    for (const bm of bookmarks.split("\n")) {
        let lock_icon;
        if (bm.length > 0) {
            if (bm.substring(0, 5) === "https") {  
                lock_icon = "locked.svg";
            } else {
                lock_icon = "unlocked.svg";
            }
            bookmark_list.push(`<li><img src="${lock_icon}" width="25"><a href="${bm}">${bm}</a></li>`);
        }
    }

    const bookmark_output = document.getElementById("bookmark_list");  // Correct ID
    bookmark_output.innerHTML = bookmark_list.join('');
}


function normalize(inp) {
    return inp.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?"'[\]\\|<>\s’]/g, '');
}

function palindromeCheck() {
    const palindromes = document.getElementById("palindrome_input").value;
    let palindrome_list = [];  

    for (const pal of palindromes.split("\n")) {
        let str = normalize(pal).toLowerCase();  
        let rev = str.split("").reverse().join("");
        if (str == rev) {
            palindrome_list.push(`<li style="color:green;">${pal}</li>`);
        } 
        else if (str != "") {
            palindrome_list.push(`<li style="color:red;">${pal}</li>`);
        }
    }

    const palindrome_output = document.getElementById("palindromes"); 
    palindrome_output.innerHTML = palindrome_list.join('');  
}
