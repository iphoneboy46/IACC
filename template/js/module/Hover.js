export default function Hover() {
  try {
    const tb = document.querySelector(".procp-tb")
    
    if (tb) {

      const rows = tb.querySelectorAll(".procp-row")  

      rows.forEach((row, r)=> {
        const cols = row.querySelectorAll(".procp-col")

        cols.forEach((col, c)=> {
            col.addEventListener("mouseenter", ()=> {
                col.classList.add("hover-p")

                rows.forEach((row1, r1)=> {
                    const cols1 = row1.querySelectorAll(".procp-col")

                    cols1[c].classList.add("hover-p")

                })
            })

            col.addEventListener("mouseleave", ()=> {
                rows.forEach((row1, r1)=> {
                    const cols1 = row1.querySelectorAll(".procp-col")

                    cols1[c].classList.remove("hover-p")

                })
            })
        })
      })
    }
    
  } catch (error) {
    console.log(error)
  }
}
