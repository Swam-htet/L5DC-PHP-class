let Display_list = (list, container) => {
  // container for the display item
  let container_div = document.getElementById(container);

  // return the DOM node list
  var domNodes = list.map(function (item) {
    // for display container
    var node = document.createElement("div");

    node.classList = `card bg-warning`;
    node.setAttribute("id", `item-${item - id}`);

    // Create a header element (e.g., h2)
    var header = document.createElement("h2");
    header.textContent = "Header Text";

    // Create a paragraph element for the content
    var paragraph = document.createElement("p");
    paragraph.textContent = obj.text;

    // Append the header and paragraph elements to the container
    node.appendChild(header);
    node.appendChild(paragraph);

    return node;
  });
  domNodes.forEach((node) => {
    container_div.appendChild(node);
  });
};
