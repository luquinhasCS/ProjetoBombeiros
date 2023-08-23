import React from "react";

export default function Button(props) {
    return (
        <div className="col-md-12 d-flex justify-content-center">
            <button class="btn btn-primary" type="button">{props.name}</button>
        </div>
    )
}