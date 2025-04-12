import { HomeIcon, UserIcon } from "@heroicons/react/24/solid";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav className="bg-blue-600 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <h1 className="text-xl font-bold">Improve your learning</h1>
        <div className="flex gap-6">
            <Link to="/" className="hover:underline"><HomeIcon/>Home</Link>
            <Link to="/about" className="hover:underline">About</Link>
            
            <Link to="/users/" className="hover:underline">
            <UserIcon/>Log In
            </Link>
        </div>
    </nav>
  )
}
export default Navbar