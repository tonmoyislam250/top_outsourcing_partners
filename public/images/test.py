from PIL import Image

# Open the original GIF
with Image.open("loading.gif") as im:
    frames = []
    for frame in range(im.n_frames):
        im.seek(frame)
        frame_image = im.copy().resize((100, 100), Image.LANCZOS)
        frames.append(frame_image)

    # Save the resized GIF
    frames[0].save(
        "loading_100x100.gif",
        save_all=True,
        append_images=frames[1:],
        loop=im.info.get("loop", 0),
        duration=im.info.get("duration", 100),
        disposal=2
    )