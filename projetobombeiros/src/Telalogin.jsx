import "./css/Telalogin.css";
import "bootstrap/dist/css/bootstrap.min.css";
import noarlogo from './imgs/noarlogo.png'
import Button from './utils/Button'

function Telalogin() {
    return (
        <div className="row col-md-12" style={{ height: "100%" }}>
            <div className="col-md-4 d-flex flex-column justify-content-center" style={{ gap: "5em" }}>
                <div className="col-md-12 d-flex justify-content-center">
                    <h1 aria-hidden="true" style={{ wordSpacing: "20px" }}>Faça Login</h1>
                </div>

                <div className="col-md-12 mt-5">
                    <div className="form-group">
                        <form action="">
                            <div className="col-md-12 d-flex align-items-center flex-column gap-5">
                                <input type="text" name="f_email" id="f_email" placeholder="E-mail" />
                                <input type="password" name="f_senha" id="f_senha" placeholder="Senha" />
                            </div>
                        </form>
                    </div>
                </div>
                <Button name="Entrar"/>
                <div className="col-md-12" style={{position:"absolute", bottom:"20px", left:"20px"}}>
                    <a href="" className="text-muted" style={{ textDecoration: "none" }}>Esqueci minha senha</a>
                </div>
            </div>
            <div className="col-md-8 d-flex align-items-center justify-content-center imagem-logo" style={{ backgroundColor: "#33338D" }}>
                <img src={noarlogo} className="logo" alt="" />
            </div>
        </div>
    )
}
// var w = window.innerWidth;
// var divImagem = document.querySelector('.imagem-logo') 
//     if (w > 992){
//         divImagem.remove()
//     }

export default Telalogin;
