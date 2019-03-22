import React from 'react';
import ReactDOM from 'react-dom';
// in avatar ist korrekter Pfad (nach erstellen des WebPack-bundels hinterlegt)
// import avatar from "./Logo-placeholder.png";
import avatar from "./icons8-benutzer-96.png";


// function Comment(props) {
//   return (
//     <div className="Comment">
//       <div className="UserInfo">
//         <img className="Avatar"
//           src={props.author.avatarUrl}
//           alt={props.author.name}
//         />
//         <div className="UserInfo-name">
//           {props.author.name}
//         </div>
//       </div>
//       <div className="Comment-text">
//         {props.text}
//       </div>
//       <div className="Comment-date">
//         {props.date.toLocaleString()}
//       </div>
//     </div>
//   );
// }

function Comment(props) {
  return (
    <div className="Comment">
      <CommentUser author={props.author}/>
      <br/>
      <CommentDate date={props.date}/>
      <br/>
      <CommentText text={props.text}/>
    </div>
  );
}

function CommentUser(props) {
  return (
      <div className="UserInfo">
        <CommentUserAvatar user={props.author} />
        <CommentUserName user={props.author} />
      </div>
  );
}
function CommentUserAvatar(props) {
  return (
    <img className="Avatar"
      src={props.user.avatarUrl}
      alt={props.user.name}
    />
  );
}
function CommentUserName(props) {
  return (
    <div className="UserInfo-name">
      {props.user.name}
    </div>
  );
}
function CommentText(props) {
  return (
      <div className="Comment-text">
        {props.text}
      </div>
  );
}

function CommentDate(props) {
  return (
      <div className="Comment-date">
        {props.date.toLocaleString()}
      </div>
  );
}

const author = {
  avatarUrl: avatar,
  name: "Wejwoda Christian"
};
const text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
const date = new Date();

// ReactDOM.render(<Comment author={author} text={text} date={date}/>, document.getElementById('root'));
ReactDOM.render(<Comment author={author} text={text} date={date}/>, document.getElementById('root'));
